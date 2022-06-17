<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'role' => 'pemilik'],
            ['id' => 2, 'role' => 'pekerja']
        ];

        foreach($roles as $role){
            Role::create($role);
        }

    }
}
