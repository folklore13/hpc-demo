## Introduction

Hello, guys :grinning: :wave:! Kenalin, nama gue Ario. Gue bakal jadi mentor kalian selama course ini berlangsung. Yang kalian lihat di sini adalah repository project di course kita yang udah gue siapin. So, if you want to keep up, make sure that you follow these steps below ya guys :smile:

## Set up your environment

Biar semuanya bisa ngikut dan biar meminimalisir jumlah protes karena error (wkwkwk), coba temen-temen bisa ikutin langkah-langkah berikut ya:

1. Clone / Download repository ini ke laptop masing-masing. Ada beberapa cara:

-   Git clone via terminal:

```
git clone https://github.com/folklore13/HPC-DEMO
```

-   Atau simply dengan download repo ini di opsi download as ZIP di atas

2. Buka repository ini di code editor masing-masing

3. Buka docs yang gue bagiin ke kalian di grup HPC. Copy "key" env-nya.
   Paste ke --key=
   Buka terminal CMD, abistu ketik perintah di bawah ini:

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

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
