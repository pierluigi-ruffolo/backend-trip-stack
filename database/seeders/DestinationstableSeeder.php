<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DestinationstableSeeder extends Seeder
{

    public function run(): void
    {
        $destinations = [
            [
                'title' => 'Vacanze Romane in Vespa',
                'country_id' => 1, // Italia
                'price_person' => 120.00,
                'duration' => 1,
                'description' => 'Esplora i vicoli della città eterna a bordo di una Vespa d’epoca.',
                'tags' => [3, 6] // Cultura, Romantico
            ],
            [
                'title' => 'Soggiorno in Ryokan a Kyoto',
                'country_id' => 2, // Giappone
                'price_person' => 450.00,
                'duration' => 3,
                'description' => 'Vivi l’esperienza autentica del Giappone dormendo su un futon e provando l’onsen.',
                'tags' => [2, 3]
            ],
            [
                'title' => 'Notte nel deserto del Sahara',
                'country_id' => 3, // Marocco
                'price_person' => 280.00,
                'duration' => 2,
                'description' => 'Cena sotto le stelle e dormi in una tenda berbera tra le dune di Merzouga.',
                'tags' => [1, 4]
            ],
            [
                'title' => 'Elicottero sul Grand Canyon',
                'country_id' => 4, // USA
                'price_person' => 350.00,
                'duration' => 1,
                'description' => 'Una vista mozzafiato dall’alto su una delle meraviglie naturali del mondo.',
                'tags' => [1, 4]
            ],
            [
                'title' => 'Carnevale a Rio de Janeiro',
                'country_id' => 5, // Brasile
                'price_person' => 900.00,
                'duration' => 5,
                'description' => 'Balla a ritmo di samba nel Sambodromo più famoso del mondo.',
                'tags' => [1, 3]
            ],
            [
                'title' => 'Snorkeling nella Grande Barriera Corallina',
                'country_id' => 6,
                'price_person' => 180.00,
                'duration' => 1,
                'description' => 'Immergiti nelle acque cristalline per ammirare coralli e pesci tropicali.',
                'tags' => [1, 4, 7]
            ],
            [
                'title' => 'Tour Enogastronomico in Toscana',
                'country_id' => 1,
                'price_person' => 220.00,
                'duration' => 2,
                'description' => 'Degustazione di Chianti e prodotti tipici tra le colline senesi.',
                'tags' => [5, 6]
            ],
            [
                'title' => 'Zaini in spalla a Tokyo',
                'country_id' => 2,
                'price_person' => 90.00,
                'duration' => 1,
                'description' => 'Alla scoperta dei quartieri più pazzi: da Akihabara a Shibuya.',
                'tags' => [1, 7]
            ]
        ];

        foreach ($destinations as $destination) {
            $newDestination = new Destination();
            $newDestination->title = $destination['title'];
            $newDestination->slug = Str::slug($destination['title']);
            $newDestination->country_id = $destination['country_id'];
            $newDestination->price_person = $destination['price_person'];
            $newDestination->duration = $destination['duration'];
            $newDestination->description = $destination['description'];
            $newDestination->save();
            $newDestination->tags()->attach($destination['tags']);
        }
    }
}
