<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'subject' => '最新フロントエンド開発のトレンドを徹底解説',
                'body' => Crypt::encryptString('フロントエンド開発の最新トレンドについて解説します。'),
                'summary' => 'フロントエンド開発のトレンド',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject' => 'PHPの新機能まるわかりガイド',
                'body' => Crypt::encryptString('PHPの新機能について詳しく解説します。'),
                'summary' => 'PHPの新機能',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject' => '図解で学ぶデータベースの正規化入門',
                'body' => Crypt::encryptString('データベースの正規化について基礎から説明します。'),
                'summary' => 'データベースの正規化',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
