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
                'name'        => 'Admin',
            ],
            [
                'name'        => 'User',
            ],
            [
                'name'        => 'Provider',
            ] 
        ];
        foreach($roles as $value){

            $demoUser = Role::create([
                'name'        => $value['name'],
            ]);
        }
    }
}
