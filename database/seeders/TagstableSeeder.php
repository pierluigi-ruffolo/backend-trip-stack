<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagstableSeeder extends Seeder
{

    public function run(): void
    {
        $tags = [
            [
                'name' => 'Avventura',
                'color' => '#f1c40f'
            ],
            [
                'name' => 'Relax',
                'color' => '#3498db'
            ],
            [
                'name' => 'Cultura',
                'color' => '#e67e22'
            ],
            [
                'name' => 'Natura',
                'color' => '#2ecc71'
            ],
            [
                'name' => 'Gastronomia',
                'color' => '#9b59b6'
            ],
            [
                'name' => 'Romantico',
                'color' => '#e74c3c'
            ],
            [
                'name' => 'Low Cost',
                'color' => '#95a5a6'
            ],
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag['name'];
            $newTag->color = $tag['color'];
            $newTag->save();
        }
    }
}
