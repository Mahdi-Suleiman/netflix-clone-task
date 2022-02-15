<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('movies')->insert([
            [
                'movie_name' => 'movie 1',
                'movie_description' => 'movie 1 description'
            ],
            [
                'movie_name' => 'movie 2',
                'movie_description' => 'movie 2 description'
            ],
            [
                'movie_name' => 'movie 3',
                'movie_description' => 'movie 3 description'
            ],
            [
                'movie_name' => 'movie 4',
                'movie_description' => 'movie 4 description'
            ],
            [
                'movie_name' => 'movie 5',
                'movie_description' => 'movie 5 description'
            ],
        ]);
    }
}