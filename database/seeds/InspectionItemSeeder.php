<?php

use Illuminate\Database\Seeder;

class InspectionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inspection_items')->insert([
            'type_id' => "1",
            'items' => 'Seat Belts/Head Rests Operation',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "1",
            'items' => 'Shift Lever/Clutch Operation',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "1",
            'items' => 'Foot Brake Function',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "1",
            'items' => 'Parking Break Function',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "1",
            'items' => 'Door and Inside Rear View Mirror',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "1",
            'items' => 'Indicator and Warning Lamp',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "1",
            'items' => 'Engine Starting Condition',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "1",
            'items' => 'Horn Sound',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "1",
            'items' => 'Wiper Blades/Nozzle',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "1",
            'items' => 'Power Window Switches',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "1",
            'items' => 'Each Lights/Lamps (Head Lights, Daytime Running Light, Turn Signal, Hazard, Break, Position, Tail, Back up, Room',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "2",
            'items' => 'Drive Belts and Hose',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "2",
            'items' => 'Air Intake Filter',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "2",
            'items' => 'Battery Terminal Looseness',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "2",
            'items' => 'Battery (with Tester)',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "3",
            'items' => 'Engine Oil',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "3",
            'items' => 'Automatic Transmission Oil',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "3",
            'items' => 'Brake Fluid/Clutch Fluid(if equipped)',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "3",
            'items' => 'Power Steering Fluid',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "3",
            'items' => 'Engine Coolant Fluid in Reservoir',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "3",
            'items' => 'Wind Shield Water Fluid',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "4",
            'items' => 'Tread (Front: Right, Left / Rear: Right, Left)',

        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "4",
            'items' => 'Abnormal Tire Wear (Tread Surface, Sidewall)',
        ]);
        DB::table('inspection_items')->insert([
            'type_id' => "4",
            'items' => 'Driveshaft Boots',
        ]);       
    }
}
