<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'review_id' => 1,
                'body' => '図が多いのは、いいな。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'review_id' => 3,
                'body' => 'ダウンロードサンプルで確認できるのは、安心。',                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'review_id' => 1,
                'body' => '概念図って重要だと思うのですが、あまり載っていないことが多い気がする。図が多いのは嬉しいです。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'review_id' => 5,
                'body' => 'リファレンスとしても使えるのは、お得だね。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}