<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 users with user_id = 1194398
        User::factory()->count(10)->create([
            'user_id' => 1194398,
        ]);
    }
}
