# fashionablyLate

## 環境構築
Dockerビルド</br>
 1.git clone git@github.com:AKawamuraCop/fashionablyLate.git</br>
 2.docker-compose up -d -build
</br>
</br>
Laravel環境構築</br>
 1.docker-compose exec php bash</br>
 2.composer install</br>
 3..env.exampleファイルから.envを作成し、環境変数を変更</br>
 4.php artisan key:generate</br>
 5.php artisan migrate</br>
 6.php artisan db:seed</br>


## 使用技術(実行環境)
・PHP 7.4</br>
・Laravel 8.83</br>
・MySQL 8.0</br>

## ER図
<img width="704" alt="ER図" src="https://github.com/user-attachments/assets/a364dad7-491b-4250-b59e-d5a049f5aac4">


## URL
・開発環境：http://localhost/</br>
・phpMyAdmin : http://localhost:8080/
