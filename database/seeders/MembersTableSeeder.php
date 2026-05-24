<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('members')->insert([
            [
                'name' => '山田祥寛',
                'name_kana' => 'やまだよしひろ',
                'password' => Hash::make('12345'),
                'email' => 'y_YAMADA@example.com',
                'prefecture' => '千葉県',
                'city' => '鎌ヶ谷市',
                'other' => '桜町1-1-1',
                'dm' => true,
                'roles' => json_encode(['admin', 'manager']),
                'info' => json_encode(['gender' => 'male', 'languages' => ['ja', 'en'], 'sns' => 'facebook']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '佐藤博之',
                'name_kana' => 'さとうひろゆき',
                'password' => Hash::make('12345'),
                'email' => 'hsatou@example.com',
                'prefecture' => '神奈川県',
                'city' => '横浜市',
                'other' => '東川町2-2-2',
                'dm' => false,
                'roles' => json_encode(['admin']),
                'info' => json_encode(['gender' => 'male', 'languages' => ['en'], 'sns' => 'instagram']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '田中千秋',
                'name_kana' => 'たなかちあき',
                'password' => Hash::make('12345'),
                'email' => 'ttanaka@example.com',
                'prefecture' => '大阪府',
                'city' => '大阪市',
                'other' => '山野町3-3-3',
                'dm' => true,
                'roles' => json_encode(['manager']),
                'info' => json_encode(['gender' => 'female', 'languages' => ['ja', 'en'], 'sns' => 'instagram']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '高橋守',
                'name_kana' => 'たかはしまもる',
                'password' => Hash::make('12345'),
                'email' => 'mtakahashi@example.com',
                'prefecture' => '福岡県',
                'city' => '福岡市',
                'other' => '森中町5-5-5',
                'dm' => true,
                'roles' => json_encode(['admin']),
                'info' => json_encode(['gender' => 'male', 'languages' => ['ja'], 'sns' => 'facebook']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '鈴木紗枝',
                'name_kana' => 'すずきさえ',
                'password' => Hash::make('12345'),
                'email' => 'ssuzuki@example.com',
                'prefecture' => '北海道',
                'city' => '札幌市',
                'other' => '林町6-6-6',
                'dm' => false,
                'roles' => json_encode(['general']),
                'info' => json_encode(['gender' => 'male', 'languages' => ['ja'], 'sns' => 'tiktok']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '伊藤孝雄',
                'name_kana' => 'いとうたかお',
                'password' => Hash::make('12345'),
                'email' => 'titou@example.com',
                'prefecture' => '沖縄県',
                'city' => '那覇市',
                'other' => '北町7-7-7',
                'dm' => true,
                'roles' => json_encode(['general']),
                'info' => json_encode(['gender' => 'male', 'languages' => ['ja'], 'sns' => 'x']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Member::factory()->has(Memo::factory()->count(3))->create();
        // Member::factory()->hasMemos(3)->create();
    }
}
