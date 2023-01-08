<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = [
            [
                'name' => 'Stasiun Jember',
                "user_id" => 2
            ],
            [
                'name' => 'Stasiun Ambulu',
                "user_id" => 2
            ],
            [
                'name' => 'Stasiun Jenggawa',
                "user_id" => 2
            ]
        ];
       foreach($stations as $station)
       {
            Station::create($station);
       }
    }
}
