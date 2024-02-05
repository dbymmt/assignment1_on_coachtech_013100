# お問い合わせフォーム

## 環境構築
1. git clone実施
1. phpコンテナにてcomposer install実施
1. .envファイル作成(.env.exampleをコピー)
1. .env内データベース関連情報を更新　※docker-compose.ymlも参照
1. config/app.phpにてタイムゾーン、ロケールを日本仕様に変更
1. php artisan migrate:fresh --seedにてテストデータ作成、phpmyadminにてデータが作成されていることを確認する

## 使用技術(実行環境)
- docker 25.02　※以下環境はすべてdockerコンテナ上
- php:7.4.9
- mysql:8.0.26
- nginx:1.21.1
- Laravel 8.x
- Laravel fortify(認証)

## URL
- お問い合わせページ：http://localhost/
- 管理者ページ：http://localhost/admin

#### ※機能面未対応事項
- 管理ユーザ新規作成不可、確認用パスワードを求められる(パスワード確認欄は仕様に伴い未作成)
- 管理ユーザ作成、ログイン時のメッセージが仕様と会わない、fortifyインストールデフォルトからの変更方法が不明(フォームリクエストを充てる方法がわからなかった)
- 管理画面のキーワード検索の部分一致完全一致の切り替え方法(現在は1単語部分一致でのみ対応)
- 出力csvファイルがUTF8のままになる(少なくともwindows環境上はexcel等使用側でutf-8変換すれば見れるようになる)
- ※管理画面の日付検索はcreated_at、updated_atあるいはそれ以外何を検索対象にすればよいか不明だったためcreated_atで検索できるようにしている、が、view側にcreated_atを記載するよう指示がなかったため実効性は乏しいように思われる。