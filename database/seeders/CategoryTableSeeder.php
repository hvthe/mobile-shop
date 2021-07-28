<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; 

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'cat_name' => 'iPhone'
        ]);
        DB::table('category')->insert([
            'cat_name' => 'Samsung'
        ]);
        DB::table('category')->insert([
            'cat_name' => 'Nokia'
        ]);
        DB::table('category')->insert([
            'cat_name' => 'Xiaomi'
        ]);
        DB::table('category')->insert([
            'cat_name' => 'Huawei'
        ]);
        DB::table('category')->insert([
            'cat_name' => 'Nokia'
        ]);
        DB::table('category')->insert([
            'cat_name' => 'OPPO'
        ]);
        DB::table('category')->insert([
            'cat_name' => 'Blackbery'
        ]);

    }
}
