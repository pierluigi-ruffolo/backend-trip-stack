<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountriestableSeeder extends Seeder
{

    public function run(): void
    {
        $countries = [
            [
                'name' => 'Italia',
                'continent' => 'Europa',
                'description' => 'Il bel paese, ricco di storia e arte.'
            ],
            [
                'name' => 'Giappone',
                'continent' => 'Asia',
                'description' => 'Un mix perfetto tra tradizione e tecnologia.'
            ],
            [
                'name' => 'Marocco',
                'continent' => 'Africa',
                'description' => 'Colori, profumi e deserti mozzafiato.'
            ],
            [
                'name' => 'Stati Uniti',
                'continent' => 'America del Nord',
                'description' => 'Dalle grandi metropoli ai parchi nazionali.'
            ],
            [
                'name' => 'Brasile',
                'continent' => 'America del Sud',
                'description' => 'Natura incontaminata e cultura vibrante.'
            ],
            [
                'name' => 'Australia',
                'continent' => 'Oceania',
                'description' => 'Terre selvagge e coste spettacolari.'
            ],
        ];
        foreach ($countries as $country) {
            $newCountry = new Country();
            $newCountry->name = $country['name'];
            $newCountry->continent = $country['continent'];
            $newCountry->description = $country['description'];
            $newCountry->save();
        }
    }
}
