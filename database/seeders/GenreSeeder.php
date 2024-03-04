<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'action',
            'adventure',
            'biography',
            'crime',
            'drama',
            'western'
        ];

        foreach ($genres as $genre) {
            Genre::query()->firstOrCreate(['title' => $genre]);
        }
    }
}
