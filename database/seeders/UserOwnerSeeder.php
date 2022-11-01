<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserOwner;

class UserOwnerSeeder extends Seeder
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
                'user_id' => 4,
                'name' => 'Owner Test',
                'phone' => '12345678'
            ]
        ];

        foreach($data as $row){
            UserOwner::create([
                'user_id' => $row['user_id'],
                'name' => $row['name'],
                'phone' => $row['phone'],
                'alamat'=> null,
                'identity_photo' => null, 
            ]);
        }
    }
}
