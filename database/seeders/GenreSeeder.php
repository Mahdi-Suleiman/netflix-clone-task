<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('genres')->insert([
            [
                'genre_name' => 'action'
            ],
            [
                'genre_name' => 'sci-fi'
            ],
            [
                'genre_name' => 'horror'
            ],
            [
                'genre_name' => 'drama'
            ],
        ]);
    }
}
