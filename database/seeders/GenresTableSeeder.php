<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        Genre::create(['name' => 'Action and Adventure']);
        Genre::create(['name' => 'Classic']);
        Genre::create(['name' => 'Comic Book or Graphic Novel']);
        Genre::create(['name' => 'Detective and Mystery']);
        Genre::create(['name' => 'Fantasy']);
        Genre::create(['name' => 'Western']);
        Genre::create(['name' => 'Horror']);
        Genre::create(['name' => 'Romance']);
        Genre::create(['name' => 'Science Fiction']);
        Genre::create(['name' => 'Short Storie']);
        Genre::create(['name' => 'Thriller']);
        Genre::create(['name' => 'Biography or Autobiography']);
        Genre::create(['name' => 'Cookbook']);
        Genre::create(['name' => 'Essay']);
        Genre::create(['name' => 'History']);
        Genre::create(['name' => 'Poetry']);
        Genre::create(['name' => 'History']);
    }
}
