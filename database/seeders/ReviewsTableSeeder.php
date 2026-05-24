<?php

namespace Database\Seeders;

use \DateTime;
use App\Models\Book;
use App\Models\Member;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'book_id' => 1,
                'member_id' => 2,
                'status' => 'published',
                'rate' => 5,
                'body' => '図が多く、難しい概念もわかりやすく解説されている。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 1,
                'member_id' => 4,
                'status' => 'published',
                'rate' => 4,
                'body' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 1,
                'member_id' => 6,
                'status' => 'published',
                'rate' => 5,
                'body' => 'サンプルが豊富で、ダウンロードして使えて便利。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 2,
                'member_id' => 3,
                'status' => 'draft',
                'rate' => 5,
                'body' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 2,
                'member_id' => 4,
                'status' => 'published',
                'rate' => 4,
                'body' => 'リファレンス代わりにも使えて重宝している。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 3,
                'member_id' => 5,
                'status' => 'published',
                'rate' => 5,
                'body' => '環境設定から丁寧に解説されている。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 3,
                'member_id' => 6,
                'status' => 'deleted',
                'rate' => 4,
                'body' => 'macOSでも学習できてよい。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 4,
                'member_id' => 5,
                'status' => 'published',
                'rate' => 5,
                'body' => 'コラムが参考になる。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 4,
                'member_id' => 6,
                'status' => 'published',
                'rate' => 4,
                'body' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 5,
                'member_id' => 3,
                'status' => 'published',
                'rate' => 5,
                'body' => '入門者にもわかりやすい。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Review::factory()->published()->create();

        // Review::factory()
        //     ->count(5)
        //     ->for(Book::factory())
        //     ->sequence(fn() => ['member_id' => Member::factory()])
        //     ->create();

        // Review::factory()
        //     ->count(5)
        //     ->forBook(['sample' => true])
        //     ->sequence(fn() => ['member_id' => Member::factory()])
        //     ->create();
    }
}
