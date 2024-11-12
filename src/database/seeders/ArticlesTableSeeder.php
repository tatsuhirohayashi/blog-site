<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        $article = [
            'user_id' => 1,
            'title' => 'こちらがブログのタイトル1になります！',
            'content' => 'こちらがブログ1の本文になります。こちらがブログ1の本文になります。こちらがブログ1の本文になります。',
            'image_url' => 'blogs-images/sea.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ];

        DB::table('articles')->insert($article);

        $article = [
            'user_id' => 1,
            'title' => 'こちらがブログのタイトル2になります！',
            'content' => 'こちらがブログ2の本文になります。こちらがブログ2の本文になります。こちらがブログ2の本文になります。',
            'image_url' => 'blogs-images/mountain.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ];

        DB::table('articles')->insert($article);

        $article = [
            'user_id' => 2,
            'title' => 'こちらがブログのタイトル3になります！',
            'content' => 'こちらがブログ3の本文になります。こちらがブログ3の本文になります。こちらがブログ3の本文になります。',
            'image_url' => 'blogs-images/town.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ];

        DB::table('articles')->insert($article);

        $article = [
            'user_id' => 2,
            'title' => 'こちらがブログのタイトル4になります！',
            'content' => 'こちらがブログ4の本文になります。こちらがブログ4の本文になります。こちらがブログ4の本文になります。',
            'image_url' => 'blogs-images/country.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ];

        DB::table('articles')->insert($article);
    }
}
