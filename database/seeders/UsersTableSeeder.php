<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => md5(123456),
            'email' => 'admin@gmail.com',
            'user_level' => '3',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'Trần Văn A',
            'password' => md5(123456),
            'email' => 'tranvana@gmail.com',
            'user_level' => '2',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'Nguyễn Trung B',
            'password' => md5(123456),
            'email' => 'nguyentrungb@gmail.com',
            'user_level' => '1',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
