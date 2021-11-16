# pengaduan_masyarakat_apps
# ara instalasi
* Klon repo GitHub untuk proyek ini secara lokal
```bash
git clone https://github.com/Hosnol/pengaduan_masyarakat_apps.git
```
* Install Composer Dependencies
```bash
composer install
```
* Buat salinan file .env Anda
```bash
cp .env.example .env
```
* Buat kunci enkripsi aplikasi
```bash
php artisan key:generate
```
* Buat database kosong untuk aplikasi kita di xampp mysql
* Dalam file .env, tambahkan informasi database untuk memungkinkan Laravel terhubung ke database
* Migrate database
```bash
php artisan migrate
```
* Seed database
```bash
php artisan db:seed
```
* User
```bash
Admin
hosnolarifin220@gmail.com
admin123
Petugas
hosnolarifin87@gmail.com
petugas123
```
