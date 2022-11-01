<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
                'email' => 'superadmin@teetip.com',
                'password' => Hash::make('superadmin'),
                'role_id' => 1
            ],
            [
                'email' => 'admin@teetip.com',
                'password' => Hash::make('admin'),
                'role_id' => 2
            ],
            [
                'email' => 'customer@teetip.com',
                'password' => Hash::make('customer'),
                'role_id' => 3
            ],
            [
                'email' => 'owner@teetip.com',
                'password' => Hash::make('owner'),
                'role_id' => 4
            ],
        ];

        foreach($data as $row){
            User::create([
                'email' => $row['email'],
                'password' => $row['password'],
                'role_id' => $row['role_id'],
            ]);
        }
    }
}
