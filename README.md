# Sistem Informasi Dinas Pendidikan DKI Jakarta

## Tata Cara Penggunaan
```
    composer install
    composer update

    npm install
    npm run dev

    php artisan migrate
    php artisan serve

    Seeding database provinsi :
    php artisan db:seed --class=IndoRegionProvinceSeeder      # Import data provinsi
    Seeding database Kota/Kab :
    php artisan db:seed --class=IndoRegionRegencySeeder       # Import data kota/kabupaten
    
    Berfungsi untuk pemilihan Provinsi, Kota/Kab**
