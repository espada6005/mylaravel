<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \DateTime;

class AuthorBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('author_book')->insert([
            [
                'author_id' => 1,
                'book_id' => 1,
                'hidden' => 0,
                'order' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 1,
                'book_id' => 2,
                'hidden' => 0,
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 2,
                'book_id' => 2,
                'hidden' => 0,
                'order' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 3,
                'book_id' => 2,
                'hidden' => 1,
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 2,
                'book_id' => 3,
                'hidden' => 0,
                'order' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 2,
                'book_id' => 4,
                'hidden' => 0,
                'order' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 3,
                'book_id' => 4,
                'hidden' => 0,
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
