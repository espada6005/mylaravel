<?php

namespace Database\Seeders;

use \DateTime;
use App\Models\Member;
use App\Models\Memo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('memos')->insert([
            [
                'memoable_type' => 'App\Models\Member',
                'memoable_id' => 1,
                'body' => '引っ越しに伴い住所を変更',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'memoable_type' => 'App\Models\Member',
                'memoable_id' => 1,
                'body' => 'プライベート用にメールアドレスを変更',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'memoable_type' => 'App\Models\Book',
                'memoable_id' => 1,
                'body' => 'React/Next.jsを学べる本。688ページもある。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'memoable_type' => 'App\Models\Book',
                'memoable_id' => 2,
                'body' => '感想を書く',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Memo::factory()->count(3)->for(Member::factory(), 'memoable')->create();
    }
}
