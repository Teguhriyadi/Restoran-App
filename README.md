.: Cara Penggunaan Project :.

1. Buka Terminal / CMD terlebih dahulu, kemudian ketikkan git clone : https://github.com/Teguhriyadi/Restoran-App.git
2. Jika sudah, tekan Enter. Dan Tunggu proses nya hingga selesai
3. Apabila sudah, kemudian ketikkan : cd/Restoran-App
4. Pastikan CMD / Folder sudah di Folder Restoran-App
5. Lalu, ketikkan : composer install (pastikan versi php diatas ^8.2)
6. Lalu tunggu proses nya hingga selesai
7. Setelah itu, rename file .env.example menjadi .env
8. Jika sudah diubah file nya, kemudian kembali ke CMD / Terminal, dan ketikkan : php artisan key:generate
9. Nantinya pada KEY : APP_KEY= akan terisi otomatis 
10. Lalu, setup bagian :

DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASS 

sesuaikan dengan konfigurasi anda, untuk nama Database Bebas, disini saya menggunakan dengan nama : test_app

11. Jika sudah, buka PhpMyAdmin / dsb, untuk membuat database baru
12. Sesuaikan nama database nya, kemudian kembali ke CMD / Terminal, dan ketikkan :

php artisan migrate:fresh --seed

agar mendapatkan table migrations yang telah dibuat.

13. Jika sudah, running project dengan cara : php artisan serve (di Terminal / CMD).
14. Selesai
