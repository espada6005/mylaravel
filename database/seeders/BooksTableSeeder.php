<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Member;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'isbn' => '978-4-8156-3594-7',
                'title' => '改訂新版 これからはじめるReact実践入門',
                'price' => 4455,
                'publisher' => 'SBクリエイティブ',
                'published' => '2025-09-12',
                'sample' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => '978-4-297-14598-9',
                'title' => 'Railsアプリケーションプログラミング',
                'price' => 3960,
                'publisher' => '技術評論社',
                'published' => '2024-12-07',
                'sample' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => '978-4-7981-8055-7',
                'title' => '独習ASP.NET Core',
                'price' => 4290,
                'publisher' => '翔泳社',
                'published' => '2024-07-16',
                'sample' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => '978-4-7981-8094-6',
                'title' => '独習Java 第6版',
                'price' => 3278,
                'publisher' => '翔泳社',
                'published' => '2024-02-15',
                'sample' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => '978-4-296-07070-1',
                'title' => '作って学べるHTML＋JavaScript',
                'price' => 2420,
                'publisher' => '日経BP',
                'published' => '2023-07-06',
                'sample' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => '978-4-297-13919-3',
                'title' => '3ステップで学ぶ MySQL入門',
                'price' => 2860,
                'publisher' => '技術評論社',
                'published' => '2024-01-25',
                'sample' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => '978-4-627-85711-7',
                'title' => 'Pythonでできる! 株価データ分析',
                'price' => 2970,
                'publisher' => '森北出版',
                'published' => '2023-01-21',
                'sample' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => '978-4-8156-1336-5',
                'title' => 'これからはじめるVue.js 3実践入門',
                'price' => 3740,
                'publisher' => 'SBクリエイティブ',
                'published' => '2022-03-19',
                'sample' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => '978-4-296-08014-4',
                'title' => '基礎からしっかり学ぶC#の教科書',
                'price' => 3190,
                'publisher' => '日経BP',
                'published' => '2022-03-03',
                'sample' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => '978-4-297-14244-5',
                'title' => 'C#ポケットリファレンス',
                'price' => 3520,
                'publisher' => '技術評論社',
                'published' => '2024-06-21',
                'sample' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Book::factory()->count(50)->create();

        // Book::factory()->count(5)->create([
        //     'publisher' => 'SBクリエイティブ',
        // ]);

        // Book::factory()->count(5)->state([
        //     'publisher' => 'SBクリエイティブ',
        // ])->create();

        // Book::factory()->count(5)->state(function (array $attrs) {
        //     return [
        //         'title' => "{$attrs['publisher']}-{$attrs['title']}",
        //     ];
        // })->create();

        // Book::factory()->count(5)->sequence(
        //     ['sample' => true],
        //     ['sample' => false],
        // )->create();

        // Book::factory()->count(5)->sequence(
        //     fn (Sequence $seq) => ['title' => '書名' . $seq->index],
        // )->create();

        // Book::factory()->trashed()->create();

        // Book::factory()->count(5)
        //     ->has(Review::factory()->count(3))
        //     ->create();

        // Book::factory()->count(5)
        //     ->has(
        //         Review::factory()->count(3)
        //             ->state(function (array $attrs, Book $book) {
        //                 return [
        //                     'status' => 'published',
        //                     'body' => $book->title . 'のレビュー',
        //                 ];
        //             })
        //     )
        //     ->create();

        // Book::factory()
        //     ->hasAttached(
        //         Author::factory()
        //             ->count(2)
        //             ->sequence(fn() => ['member_id' => Member::factory()]),
        //         ['hidden' => false]
        //     )
        //     ->create();

        // Book::factory()
        //     ->hasReviews(5, ['status' => 'draft'])
        //     ->create();
    }
}
