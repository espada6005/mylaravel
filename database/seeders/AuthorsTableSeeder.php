<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'member_id' => 1,
                'pen_name' => 'WINGS山田',
                'debut' => '1998-12-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_id' => 2,
                'pen_name' => 'Hiro',
                'debut' => '2004-09-22',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_id' => 3,
                'pen_name' => 'ちとせ',
                'debut' => '2010-03-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
