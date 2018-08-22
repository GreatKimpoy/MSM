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
        $this->call(InspectionTypeSeeder::class);
        $this->call(InspectionItemSeeder::class);
        $this->call(VehiclePartsSeeder::class);
        $this->call(VehicleCategoriesSeeder::class);
    }
}