<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function calculateTransactionAfterBalance()
    {
        // 1) Calculate Transaction After Balance wrt trans_user_id, trans_date
        $transactions = Transaction::orderBy('trans_user_id')
            ->orderBy('trans_plaid_date')
            ->get();

        $balanceByUserDate = [];

        foreach ($transactions as $transaction) {
            $userId = $transaction->trans_user_id;
            $date = $transaction->trans_plaid_date;

            if (!isset($balanceByUserDate[$userId][$date])) {
                $balanceByUserDate[$userId][$date] = 0;
            }

            // Assuming trans_plaid_amount is a positive value for income and a negative value for expenses
            $balanceByUserDate[$userId][$date] += $transaction->trans_plaid_amount;
        }

        // 2) Set All Users' Initial Balance to $5
        $users = User::all();

        foreach ($users as $user) {
            $transactionsByUser = $transactions->where('trans_user_id', $user->id);
            $balance = $user->initial_balance;

            foreach ($transactionsByUser as $transaction) {
                // Assuming trans_plaid_amount is a positive value for income and a negative value for expenses
                $balance += $transaction->trans_plaid_amount;
            }

            // Save or perform actions with $balance
            // For example, update the user's balance in the database
            $user->update(['balance' => $balance]);
        }

        // 3) Transaction after balance should be calculated logically
        // Perform any additional logic here

        return response()->json(['message' => 'Transaction after balance calculated successfully']);
    }

    public function calculateMetrics(Request $request)
    {
        // Calculate last 30 days income excluding transactions with category_id 18020004
        $last30DaysIncome = $this->calculateLast30DaysIncome(18020004);

        // Calculate debit transaction count in the last 30 days
        $debitTransactionCount = $this->calculateDebitTransactionCount();

        // Sum of debit transactions amount done on Friday/Saturday/Sunday
        $sumDebitOnWeekend = $this->sumDebitOnWeekend();

        // Sum of income with transaction amount > 15
        $sumIncomeGreaterThan15 = $this->sumIncomeGreaterThan15();

        return response()->json([
            'last_30_days_income' => $last30DaysIncome,
            'debit_transaction_count' => $debitTransactionCount,
            'sum_debit_on_weekend' => $sumDebitOnWeekend,
            'sum_income_greater_than_15' => $sumIncomeGreaterThan15,
        ]);
    }

    private function calculateLast30DaysIncome($excludedCategoryId)
    {
        return Transaction::whereDate('created_at', '>=', Carbon::now()->subDays(30))
            ->where('category_id', '!=', $excludedCategoryId)
            ->where('amount', '>', 0)
            ->sum('amount');
    }

    private function calculateDebitTransactionCount()
    {
        return Transaction::whereDate('created_at', '>=', Carbon::now()->subDays(30))
            ->where('amount', '<', 0)
            ->count();
    }

    private function sumDebitOnWeekend()
    {
        return Transaction::whereDate('created_at', '>=', Carbon::now()->subDays(30))
            ->whereIn(Carbon::parse('created_at')->format('N'), [5, 6, 7]) // 5, 6, 7 represent Friday, Saturday, Sunday
            ->where('amount', '<', 0)
            ->sum('amount');
    }

    private function sumIncomeGreaterThan15()
    {
        return Transaction::whereDate('created_at', '>=', Carbon::now()->subDays(30))
            ->where('amount', '>', 15)
            ->sum('amount');
    }
}
