<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Flights;
use App\Models\User;

class FlightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $flights = [
            [
                'origin' => 'barcelona',
                'destination' => 'brussels',
                'airline' => 'lufthansa',
                'price' => 190.32,
                'noOfSeats' => 198
            ],
            [
                'origin' => 'new york',
                'destination' => 'los angeles',
                'airline' => 'spirit',
                'price' => 54.32,
                'noOfSeats' => 198
            ],
            [
                'origin' => 'san francisco',
                'destination' => 'toronto',
                'airline' => 'air canada',
                'price' => 31.32,
                'noOfSeats' => 112
            ],
            [
                'origin' => 'london',
                'destination' => 'glasgow',
                'airline' => 'british airways',
                'price' => 222.00,
                'noOfSeats' => 161
            ],
            [
                'origin' => 'dublin',
                'destination' => 'istanbul',
                'airline' => 'fly pegasus',
                'price' => 100.00,
                'noOfSeats' => 198
            ],
            [
                'origin' => 'cairo',
                'destination' => 'cape town',
                'airline' => 'ethipoian airways',
                'price' => 190.32,
                'noOfSeats' => 198
            ],
        ];

        foreach($flights as $key => $value) {
            Flights::create($value);
        }
    }
}
