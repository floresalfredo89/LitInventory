<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('user_books')->insert([
            'user_id' => 1,
            'book_id' => 1,
            'acquired_at' => '2025-01-20',
            'buy_price' => 350.50
        ]);

        DB::table('user_books')->insert([
            'user_id' => 1,
            'book_id' => 3,
            'acquired_at' => '2025-01-20',
            'buy_price' => 219.99
        ]);
    }
}
