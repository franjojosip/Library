<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create(['name' => 'Vjenceslav Novak']);
        Author::create(['name' => 'Miroslav Krleža']);
        Author::create(['name' => 'Dragutin Tadijanović']);
        Author::create(['name' => 'Tin Ujević']);
        Author::create(['name' => 'Ivo Andrić']);
        Author::create(['name' => 'Ivana Brlić Mažuranić']);
        Author::create(['name' => 'Marija Jurić Zagorka']);
        Author::create(['name' => 'Vesna Parun']);
        Author::create(['name' => 'William Shakespeare']);
        Author::create(['name' => 'Lav Nikolajević Tolstoj']);
        Author::create(['name' => 'Fjodor Mihajlovič Dostojevski']);
        Author::create(['name' => 'Ernest Hemingway']);
        Author::create(['name' => 'George Orwell']);
        Author::create(['name' => 'Edgar Allan Poe']);
        Author::create(['name' => 'Mark Twain']);
        Author::create(['name' => 'Honore de Balzac']);
        Author::create(['name' => 'Homer']);
        Author::create(['name' => 'Franz Kafka']);
    }
}
