# Magang - Batu Kota Bagian Umum

## Username Password Role
| Username | Password | Role |
| ----------- | ----------- | ----------- |
| admin@gmail.com | password | Admin |
| user@gmail.com | password | User |

## Instalasi
1. Buka Terminal. (ex: git bash, cmd, dll)
2. Clone repository ini menggunakan perintah `git clone https://github.com/stay-coding/batu-umum.git`
3. Change direktory menggunakan perintah `cd batu-umum`
4. Masukkan perintah `composer install` untuk menginstall data vendor
5. Masukkan perintah `cp .env.example .env` untuk menyalin file `.env`
6. Masukkan perintah `php artisan key:generate` untuk mengenerate APP_KEY
7. Masukkan perintah `php artisan migrate` untuk melakukan migrasi database
8. Jika terdapat inputan di terminal tulis `yes` kemudian enter
9. Masukkan perintah `php artisan migrate:fresh --seed` agar DatabaseSeeder dijalankan dan membuat data di database
10. Masukkan perintah `php artisan storage:link` agar Storage dapat diakses public
11. Buat folder `profile` di `storage/app/public` dan struktur folder menjadi `storage/app/public/profile`
12. `note: jangan lupa konfigurasi email` di file `.emv`

