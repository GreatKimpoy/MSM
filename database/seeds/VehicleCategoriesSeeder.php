<?php

use Illuminate\Database\Seeder;

class VehicleCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_categories')->insert([
            'brand' => 'Toyota',
            'model' => 'Yaris',
            'year_made' => '2016',
            'size' => 'Subcompact',  
            'transmission_type' => 'Manual',
        ]);
        DB::table('vehicle_categories')->insert([
            'brand' => 'Ford',
            'model' => 'Escape',
            'year_made' => '2017',
            'size' => 'Compact Crossover',  
            'transmission_type' => 'Automatic',
        ]);
        DB::table('vehicle_categories')->insert([
            'brand' => 'Kia',
            'model' => 'Niro',
            'year_made' => '2017',
            'size' => 'Subcompact Mini Car',  
            'transmission_type' => 'Automatic, Manual',
        ]);
    }
}
