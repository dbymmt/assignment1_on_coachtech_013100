# お問い合わせフォーム

## 環境構築
- git clone実施
- phpコンテナにてcomposer install実施
- .envファイル作成(.env.exampleをコピー)
- .env内データベース関連情報を更新　※docker-compose.ymlも参照
- config/app.phpにてタイムゾーン、ロケールを日本仕様に変更
- php artisan migrate:fresh --seedにてテストデータ作成、phpmyadminにてデータが作成されていることを確認する

## 使用技術(実行環境)
- docker 25.02　※以下環境はすべてdockerコンテナ上
- php:7.4.9
- mysql:8.0.26
- nginx:1.21.1
- Laravel 8.x
- Laravel fortify(認証)

## ER図
< - - - 作成したER図の画像 - - - >

## URL
- お問い合わせページ：http://localhost/
- 管理者ページ：http://localhost/admin

### 未対応事項
- 管理ユーザ新規作成不可、確認用パスワードを求められる(パスワード確認欄は仕様に伴い未作成)
- 管理ユーザ作成、ログイン時のメッセージが仕様と会わない、fortifyインストールデフォルトからの変更方法が不明