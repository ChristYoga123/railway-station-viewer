<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trains = [
            [
                'name' => 'Probowangi'
            ],
            [
                'name' => 'Sri Tanjung'
            ],
            [
                'name' => 'Logawa'
            ]
        ];
        foreach($trains as $train) {
            Train::create($train);
        }
    }
}
