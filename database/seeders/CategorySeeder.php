<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'programming',
                'slug' => 'programming',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'general',
                'slug' => 'general',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'user interface',
                'slug' => 'user-interface',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'other',
                'slug' => 'other',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
