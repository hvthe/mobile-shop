<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'value' => 30000000,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('orders')->insert([
            'value' => 50000000,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('orders')->insert([
            'value' => 20000000,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
