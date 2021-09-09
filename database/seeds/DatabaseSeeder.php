<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(UpazilaSeeder::class);
    }
}
