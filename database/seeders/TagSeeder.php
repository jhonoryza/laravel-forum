<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'name' => 'laravel',
                'slug' => 'laravel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'javascript',
                'slug' => 'javascript',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'golang',
                'slug' => 'golang',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'python',
                'slug' => 'python',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
