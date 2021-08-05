<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 3; $i++){
            DB::table('order_detail')->insert([
                'ord_id' => 1,
                'prd_id' => rand(1, 10),
                'quantity' => 1
            ]);
        }
        for($i = 0; $i < 5; $i++){
            DB::table('order_detail')->insert([
                'ord_id' => 2,
                'prd_id' => rand(1, 10),
                'quantity' => 1
            ]);
        }
        for($i = 0; $i < 2; $i++){
            DB::table('order_detail')->insert([
                'ord_id' => 3,
                'prd_id' => rand(1, 10),
                'quantity' => 1
            ]);
        }
    }
}
