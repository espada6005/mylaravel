<?php

namespace Database\Seeders;

use \DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaggablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('taggables')->insert([
            [
                'tag_id' => 1,
                'taggable_type' => 'App\Models\Article',
                'taggable_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 2,
                'taggable_type' => 'App\Models\Article',
                'taggable_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 1,
                'taggable_type' => 'App\Models\Book',
                'taggable_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 2,
                'taggable_type' => 'App\Models\Book',
                'taggable_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
