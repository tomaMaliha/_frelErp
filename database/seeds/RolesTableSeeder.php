<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'name'=>'Admin',
        	'description'=>'All Access',
        	'status'=>'1',
        ]);

        Role::create([
            'name'=>'Sales Manager',
            'description'=>'All Access',
            'status'=>'1',
        ]);

        Role::create([
            'name'=>'Zonal Manager',
            'description'=>'All Access',
            'status'=>'1',
        ]);

        Role::create([
            'name'=>'Divisional Manager',
            'description'=>'All Access',
            'status'=>'1',
        ]);

        Role::create([
            'name'=>'General Manager',
            'description'=>'All Access',
            'status'=>'1',
        ]);

        Role::create([
            'name'=>'Staff',
            'description'=>'All Access',
            'status'=>'1',
        ]);

        Role::create([
            'name'=>'Distributor',
            'description'=>'All Access',
            'status'=>'1',
        ]);
    }
}
