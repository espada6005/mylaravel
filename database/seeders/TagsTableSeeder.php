<?php

namespace Database\Seeders;

use \DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            [
                'name' => 'JavaScript',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ルーティング',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'フレームワーク',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
