<?php

use Illuminate\Database\Seeder;

class InspectionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inspection_types')->insert([
            'name' => 'Inside Car',
        ]);
         DB::table('inspection_types')->insert([
            'name' => 'Engine Room',
        ]);
        DB::table('inspection_types')->insert([
            'name' => 'Fluid Level',
        ]);
        DB::table('inspection_types')->insert([
            'name' => 'Tires Wear Condition and Drivershaft Boots',
        ]);
    }
}
