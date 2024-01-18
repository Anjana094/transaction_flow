<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function calculateClosingBalance(Request $request, $userId)
    {
        $transactions = Transaction::where('user_id', $userId)->orderBy('created_at')->get();

        // Calculate Daily Closing Balance for 90 days
        $dailyClosingBalance = $this->calculateDailyClosingBalance($transactions);

        // Calculate 90 Days Average Balance
        $averageBalance90Days = $this->calculateAverageBalance($dailyClosingBalance);

        // Calculate First 30 Days Average Closing Balance
        $averageBalanceFirst30Days = $this->calculateAverageBalance(array_slice($dailyClosingBalance, 0, 30));

        // Calculate Last 30 Days Average Closing Balance
        $averageBalanceLast30Days = $this->calculateAverageBalance(array_slice($dailyClosingBalance, -30));

        return response()->json([
            'daily_closing_balance' => $dailyClosingBalance,
            'average_balance_90_days' => $averageBalance90Days,
            'average_balance_first_30_days' => $averageBalanceFirst30Days,
            'average_balance_last_30_days' => $averageBalanceLast30Days,
        ]);
    }

    private function calculateDailyClosingBalance($transactions)
    {
        $dailyClosingBalance = [];
        $currentBalance = 0;

        foreach ($transactions as $transaction) {
            $currentBalance += $transaction->amount;
            $dailyClosingBalance[] = [
                'date' => $transaction->created_at->toDateString(),
                'closing_balance' => $currentBalance,
            ];
        }

        return $dailyClosingBalance;
    }

    private function calculateAverageBalance($closingBalances)
    {
        $totalBalance = 0;

        foreach ($closingBalances as $balance) {
            $totalBalance += $balance['closing_balance'];
        }

        return count($closingBalances) > 0 ? $totalBalance / count($closingBalances) : 0;
    }
}
