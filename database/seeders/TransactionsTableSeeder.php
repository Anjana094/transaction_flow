<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;


class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = include(database_path('transaction.php'));
        foreach ($transactions as $transactionData) {
            // dd($transactionData);
            // Transaction::create($transactionData);
            // Convert categories to a string if needed
            if (is_array($transactionData['trans_plaid_categories'])) {
                $transactionData['trans_plaid_categories'] = implode(',', $transactionData['trans_plaid_categories']);
            }

            // Use mass assignment to create the Transaction model
            Transaction::create([
                'trans_id' => $transactionData['trans_id'],
                'trans_user_id' => $transactionData['trans_user_id'],
                'trans_plaid_trans_id' => $transactionData['trans_plaid_trans_id'],
                'trans_plaid_categories' => $transactionData['trans_plaid_categories'],
                'trans_plaid_amount' => $transactionData['trans_plaid_amount'],
                'trans_plaid_category_id' => $transactionData['trans_plaid_category_id'],
                'trans_plaid_date' => $transactionData['trans_plaid_date'],
                'trans_plaid_name' => $transactionData['trans_plaid_name'],
            ]);
        }
    }
}
