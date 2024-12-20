<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
                'nama_user' => 'admin',
                'username' => 'shendy',
                'email' => 'admin@gmail.com',
                'id_jenis_user' => 'admin',
                'password' => bcrypt(12345678)
            ],
            [
                'nama_user' => 'mahasiswa',
                'username' => 'shendy',
                'email' => 'student@gmail.com',
                'id_jenis_user' => 'user',
                'password' => bcrypt(12345678)
            ]
        );

        DB::table('users')->insert($data);
    }
}
