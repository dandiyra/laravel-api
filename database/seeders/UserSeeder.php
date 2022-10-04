<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'full_name' => 'superadmin',
                'username' => 'sadmin',
                'password' => Hash::make('admin123'),
                'phone_number' => '834227349',
                'date_of_birth' => '1998-09-14',
                'age' => '24'
            ],
            [
                'full_name' => 'Dandy Yudistira',
                'username' => 'dandiyra',
                'password' => Hash::make('admin123'),
                'phone_number' => '834227349',
                'date_of_birth' => '1998-09-14',
                'age' => '24'
            ],
        ];
        foreach ($data as $key) {
            DB::table('users')->insert($key);
        }
    }
}
