<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->insert([
            'title' => 'Mobile Shop',
            'logo' => 'logo.png',
            'address'=> 'Tòa nhà Keangnam, đường Phạm Hùng, phường Mễ Trì, Quận Nam Từ Liêm, Hà Nội',
            'service' => 'Bảo hành rơi vỡ, ngấm nước Care Diamond Bảo hành Care X60 rơi vỡ ngấm nước vẫn Đổi mới',
            'hotline' => 'Phone Sale: (+84) 0123 456 798 Email: hvthe.@gmail.com',
            'slide' => '5 images'
        ]);
    }
}
