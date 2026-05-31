<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([BooksTableSeeder::class]);
        $this->call([MembersTableSeeder::class]);
        $this->call([MemosTableSeeder::class]);
        $this->call([TagsTableSeeder::class]);
        $this->call([ArticlesTableSeeder::class]);
        $this->call([ReviewsTableSeeder::class]);
        $this->call([CommentsTableSeeder::class]);
        $this->call([AuthorsTableSeeder::class]);
        $this->call([AuthorBookTableSeeder::class]);
        $this->call([TaggablesTableSeeder::class]);
    }
}
