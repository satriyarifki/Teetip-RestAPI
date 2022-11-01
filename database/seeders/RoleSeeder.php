<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['role_name' => 'superadmin'],
            ['role_name' => 'admin'],
            ['role_name' => 'customer'],
            ['role_name' => 'owner'],
        ];

        foreach($data as $row){
            Role::create([
                'role_name' => $row['role_name']
            ]);
        }
    }
}
