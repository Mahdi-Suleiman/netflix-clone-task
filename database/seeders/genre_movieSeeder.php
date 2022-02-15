<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class genre_movieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('genre_movie')->insert([
            [
                'movie_id' => '1',
                'genre_id' => '1'
            ],
            [
                'movie_id' => '1',
                'genre_movie' => '2'
            ],


            [
                'movie_id' => '2',
                'genre_movie' => '3'
            ],
            [
                'movie_id' => '2',
                'genre_movie' => '4'
            ],


            [
                'movie_id' => '3',
                'genre_movie' => '2'
            ],
            [
                'movie_id' => '4',
                'genre_movie' => '4'
            ],
            [
                'movie_id' => '5',
                'genre_movie' => '1'
            ],
        ]);
    }
}