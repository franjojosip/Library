<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::create(['name' => 'Školska knjiga']);
        Publisher::create(['name' => 'SysPrint']);
        Publisher::create(['name' => 'ABC naklada']);
        Publisher::create(['name' => 'Mladost']);
        Publisher::create(['name' => 'Alfa']);
        Publisher::create(['name' => 'Element']);
        Publisher::create(['name' => 'Znanje']);
        Publisher::create(['name' => 'Mozaik knjiga']);
        Publisher::create(['name' => 'Penguin Random House']);
        Publisher::create(['name' => 'Hachette Livre']);
        Publisher::create(['name' => 'HarperCollins']);
        Publisher::create(['name' => 'Macmillan Publishers']);
        Publisher::create(['name' => 'Simon & Schuster']);
        Publisher::create(['name' => 'Springer Nature']);
        Publisher::create(['name' => 'Wiley (John Wiley & Sons)']);
        Publisher::create(['name' => 'Grupo Santillana']);
        Publisher::create(['name' => 'Bonnier Books']);
        Publisher::create(['name' => 'Bergamont Books']);
    }
}
