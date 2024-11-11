<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $article = [
            'user_id' => 1,
            'title' => 'こちらがブログのタイトル1になります！',
            'content' => 'こちらがブログ1の本文になります。こちらがブログ1の本文になります。こちらがブログ1の本文になります。',
            'image_url' => 'blogs-images/sushi.jpg',
        ];

        DB::table('articles')->insert($article);

        $article = [
            'user_id' => 1,
            'title' => 'こちらがブログのタイトル2になります！',
            'content' => 'こちらがブログ2の本文になります。こちらがブログ2の本文になります。こちらがブログ2の本文になります。',
            'image_url' => 'blogs-images/italian.jpg',
        ];

        DB::table('articles')->insert($article);

        $article = [
            'user_id' => 2,
            'title' => 'こちらがブログのタイトル3になります！',
            'content' => 'こちらがブログ3の本文になります。こちらがブログ3の本文になります。こちらがブログ3の本文になります。',
            'image_url' => 'blogs-images/izakaya.jpg',
        ];

        DB::table('articles')->insert($article);

        $article = [
            'user_id' => 2,
            'title' => 'こちらがブログのタイトル4になります！',
            'content' => 'こちらがブログ4の本文になります。こちらがブログ4の本文になります。こちらがブログ4の本文になります。',
            'image_url' => 'blogs-images/ramen.jpg',
        ];

        DB::table('articles')->insert($article);
    }
}
