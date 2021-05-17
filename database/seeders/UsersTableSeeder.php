<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'admin', 'email' => 'admin@mail.com', 'password' => bcrypt('admin'), 'role_id' => '1']);
        User::create(['name' => 'user', 'email' => 'user@mail.com', 'password' => bcrypt('user'), 'role_id' => '2']);
    }
}
