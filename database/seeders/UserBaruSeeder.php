<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserBaruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nik' => '3001768938471999',
            'name' => 'Administrator',
            'email' => 'hosnolarifin87@gmail.com',
            'phone' => '087657889144',
            'password' => Hash::make('admin123'),
            'roles' => 'ADMIN'
        ]);
    }
}
