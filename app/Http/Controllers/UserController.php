<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Log;
class UserController extends Controller
{
    public function calculateClosingBalance(Request $request, $userId)
    {
        try{

            $transactions = Transaction::where('trans_user_id', $userId)
            ->where('created_at', '>=', now()->subDays(90)->toDateString())
            ->where('created_at', '<=', now()->toDateString())->orderBy('trans_plaid_date')->get();
    
    
            // Calculate Daily Closing Balance for 90 days
            $dailyClosingBalance = $this->calculateDailyClosingBalance($transactions);
    
            // Calculate 90 Days Average Balance
            $averageBalance90Days = $this->calculateAverageBalance($dailyClosingBalance);
    
            // Calculate First 30 Days Average Closing Balance
            $averageBalanceFirst30Days = $this->calculateAverageBalance(array_slice($dailyClosingBalance, 0, 30));
    
            // Calculate Last 30 Days Average Closing Balance
            $averageBalanceLast30Days = $this->calculateAverageBalance(array_slice($dailyClosingBalance, -30));
    
            return response()->json([
                'success'=>true,'mesaage'=>"Caclulate closing balance successfully",
                'daily_closing_balance' => $dailyClosingBalance,
                'average_balance_90_days' => $averageBalance90Days,
                'average_balance_first_30_days' => $averageBalanceFirst30Days,
                'average_balance_last_30_days' => $averageBalanceLast30Days,
            ]);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['status' =>false, 'message' => $e->getMessage(),'code'=>402],402);
        }
    }

    private function calculateDailyClosingBalance($transactions)
    {
        $dailyClosingBalance = [];
        $currentBalance = 0;

        foreach ($transactions as $transaction) {
            $currentBalance += $transaction->trans_plaid_amount;
            $dailyClosingBalance[] = [
                'date' => $transaction->trans_plaid_date,
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
