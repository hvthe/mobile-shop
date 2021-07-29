<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => Str::random(5).' '.Str::random(5),
            'address' => 'hanoi',
            'phone' => '0983456789',
            'order_id' => 2
        ]);
    }
}
