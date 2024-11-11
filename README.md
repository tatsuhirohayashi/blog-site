# アプリケーション名

Blog Site<br>

概要説明（どんなアプリか）<br>
ブログ記事の投稿、編集、削除ができるアプリ<br>

# 機能一覧

・会員登録<br>
・ログイン<br>
・ログアウト<br>
・ブログ記事投稿機能<br>
・ブログ記事編集機能<br>
・ブログ記事削除機能<br>
・バリデーション機能<br>

## 使用技術（実行環境）

・PHP 8.1<br>
・Laravel 10<br>
・MySQL 8.0.26<br>

# 環境構築

Dockerビルド<br>
1.複製する<br>
`git clone リンク`<br>
2.DockerDesktopアプリを立ち上げる<br>
3.Dockerを起動する<br>
`docker-compose up -d --build`<br>

MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。<br>

Laravel環境構築<br>

4.phpコンテナに入る<br>
`docker-compose exec php bash`<br>
5.コンポーザーをインストールする<br>
`composer install`<br>
6.env.exampleファイルから.envを作成し、環境変数を変更する<br>

このときenvファイルの内容は以下としてください。<br>
DB_HOST=mysql<br>
DB_DATABASE=laravel_db<br>
DB_USERNAME=laravel_user<br>
DB_PASSWORD=laravel_pass<br>

7.アプリケーションキーを生成する<br>
`php artisan key:generate`<br>
8.マイグレーションを実行する<br>
`php artisan migrate`<br>
9.シーディングを実行する<br>
`php artisan db:seed`<br>
+αストレージリンクを作成する（※必要に応じてコマンドを打ってください。）<br>
`php artisan storage:link`<br>

## アカウントの種類（テストユーザー）

メールアドレス：test@example1.com<br>
パスワード：testtesttest<br>

## 参考にしたもの

ログイン画面<br>
https://github.com/tatsuhirohayashi/advanced-level-project/blob/main/src/resources/views/auth/login.blade.php<br>

登録画面<br>
https://github.com/tatsuhirohayashi/advanced-level-project/blob/main/src/resources/views/auth/register.blade.php<br>

トップページ<br>
https://github.com/tatsuhirohayashi/advanced-level-project/blob/main/src/resources/views/index.blade.php<br>

投稿ページ<br>
https://github.com/tatsuhirohayashi/advanced-level-project/blob/main/src/resources/views/review-post.blade.php<br>

編集ページ<br>
https://github.com/tatsuhirohayashi/advanced-level-project/blob/main/src/resources/views/review-update.blade.php<br>