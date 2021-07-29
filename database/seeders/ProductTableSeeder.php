<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 2; $i++){
            DB::table('products')->insert([
                'cat_id' => rand(1, 8),
                'prd_name' => Str::random(10),
                'prd_price' => '10000000',
                'prd_image' => 'default.png',
                'prd_warranty' => Str::random(15),
                'prd_accessories' => Str::random(25),
                'prd_new' => 'new 100%',
                'prd_promotion' => Str::random(25),
                'prd_status' => rand(0, 1),
                'prd_featured' => rand(0, 1),
                'related_products' => '5,4,8,10,13,7,6',
                'view' => rand(100, 500),
                'prd_details' => Str::random(10).' '.Str::random(10).' '.Str::random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
