## Introduction

Hello, guys :grinning::wave:! Kenalin, nama gue Ario. Gue bakal jadi mentor kalian selama course ini berlangsung. Yang kalian lihat di sini adalah repository project di course kita yang udah gue siapin. So, if you want to keep up, make sure that you follow these steps below ya guys :smile:

## Prerequisites

Sebelum lo atur-atur setup di local elo, you should have these tools installed on your PC:

1. Composer
2. PHP ^8.2 (Repo ini menggunakan Laravel 11, so please consider installing/updating it if you haven't done so already :smile: :pray:)
3. MySQL latest version
4. Nodejs
5. Visual Studio Code
6. PHPMyAdmin

Poin 1 - 4 semuanya sudah included di aplikasi Laragon. Please consider installing Laragon for the sake of simplicity, guys :pray:

If you use Laragon, you may not have phpmyadmin installed by default. It's used for us to track the data and its schema on the database. Don't worry. I made a video of how to install it in your Laragon. Kindly click [this link over here](https://drive.google.com/drive/folders/1qy5puQWNdC2BqjG6oTVDh7FT-bCkJWVK?usp=sharing):pray::smile:

## Set up your environment

Biar semuanya bisa ngikut dan biar meminimalisir jumlah protes karena error (wkwkwk), coba temen-temen bisa ikutin langkah-langkah berikut ya:

1. Clone / Download repository ini ke laptop masing-masing. Ada beberapa cara:

-   Git clone via terminal:

```
git clone https://github.com/folklore13/HPC-DEMO
```

-   Atau simply dengan download repo ini di opsi download as ZIP di atas

2. Buka repository ini di code editor masing-masing

3. Buka terminal CMD di code editor (di sini gue pake visual studio code), lalu ketik perintah berikut:

```
composer install
```

4. Buka docs yang gue bagiin ke kalian di grup HPC. Copy "key" env-nya.
   Paste ke --key=
   di terminal CMD, abistu ketik perintah di bawah ini:

```
php artisan env:decrypt --key= ini diisi key yang gue kasih. Langsung paste di sini
```

4. Setelah file `.env` berhasil di-decrypt, ketik perintah ini di command line kalian untuk generate value `APP_KEY` di file `.env` masing-masing

```
php artisan key:generate
```

5. Coba jalanin perintah ini di terminal command line untuk jalanin app-nya:

```
php artisan serve
```

Kalo udah jalanin langkah-langkah di atas dengan benar, harusnya sih aman ya guys. Thank you!

## Tools

<p align="center">
  <a href="https://github.com/folklore13">
    <img src="https://skillicons.dev/icons?i=html,css,javascript,laravel,bootstrap,nodejs,git" />
  </a>
</p>

## License

-   This application uses SB Admin 2 Template. Give it a star [here](https://github.com/startbootstrap/startbootstrap-sb-admin-2). Licensed under the [MIT license](https://opensource.org/licenses/MIT).
-   The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
