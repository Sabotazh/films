<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = Genre::all();

        $film = Film::query()->firstOrCreate([
            'name' => 'Побег из Шоушенка',
            'isPublished' => true,
            'poster' => 'https://m.media-amazon.com/images/M/MV5BNDE3ODcxYzMtY2YzZC00NmNlLWJiNDMtZDViZWM2MzIxZDYwXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_SX300.jpg',
            'created_at' => '1994-10-14 00:00:00'
        ]);
        $film->genres()->attach([$genres[4]->id]);

        $film = Film::query()->firstOrCreate([
            'name' => 'Крёстный отец',
            'isPublished' => true,
            'poster' => 'https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg',
            'created_at' => '1972-03-24 00:00:00'
        ]);
        $film->genres()->attach([$genres[3]->id, $genres[4]->id]);

        $film = Film::query()->firstOrCreate([
            'name' => 'Темный рыцарь',
            'isPublished' => true,
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SX300.jpg',
            'created_at' => '2008-06-18 00:00:00'
        ]);
        $film->genres()->attach([$genres[0]->id, $genres[3]->id, $genres[4]->id]);

        $film = Film::query()->firstOrCreate([
            'name' => 'Крёстный отец 2',
            'isPublished' => true,
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMWMwMGQzZTItY2JlNC00OWZiLWIyMDctNDk2ZDQ2YjRjMWQ0XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg',
            'created_at' => '1974-12-18 00:00:00'
        ]);
        $film->genres()->attach([$genres[3]->id, $genres[4]->id]);

        $film = Film::query()->firstOrCreate([
            'name' => '12 разгневанных мужчин',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMWU4N2FjNzYtNTVkNC00NzQ0LTg0MjAtYTJlMjFhNGUxZDFmXkEyXkFqcGdeQXVyNjc1NTYyMjg@._V1_SX300.jpg',
            'created_at' => '1977-04-10 00:00:00'
        ]);
        $film->genres()->attach([$genres[3]->id, $genres[4]->id]);

        $film = Film::query()->firstOrCreate([
            'name' => 'Список Шиндлера',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BNDE4OTMxMTctNmRhYy00NWE2LTg3YzItYTk3M2UwOTU5Njg4XkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SX300.jpg',
            'created_at' => '1994-02-04 00:00:00'
        ]);
        $film->genres()->attach([$genres[3]->id, $genres[4]->id]);
    }
}
