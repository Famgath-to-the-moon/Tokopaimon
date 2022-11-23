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
            [
                'id' => 1,
                'name' =>'admin',
            ],
            [
                'id' => 2,
               'name'=> 'user',
            ],
        ];
    
        foreach ($roles as $key => $role) {
            Role::create($role);
        }
    }
}
