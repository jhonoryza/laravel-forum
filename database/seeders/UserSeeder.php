<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'fajar',
            'email' => 'jardik.oryza@gmail.com',
            'password' => bcrypt('password'),
            'type' => User::ADMIN
        ]);
        User::factory(20)->create(['type' => User::ADMIN]);
    }
}
