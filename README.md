# laravel-api
 
# 1. Setup
Repositori ini dibangun dengan Laravel versi 8 ke atas. Setelah melakukan fork dan clone dari repositori ini, lakukanlah langkah-langkah di bawah ini untuk menjalankan project. 

* masuk ke direktori laravel-api
```bash
$ cd laravel-api
```
* jalankan perintah composer install untuk mendownload direktori vendor
```bash
$ composer install
```
* buat file .env lalu isi file tersebut dengan seluruh isi dari file .env.example

* jalankan perintah php artisan key generate
```bash
$ php artisan key:generate
```

* Tambahan: Untuk pengerjaan di laptop/PC masing-masing, sesuaikan nama database, username dan password nya di file .env dengan database kalian. 

Setelah itu lakukan migrate ke database
```bash
$ php artisan migrate
```
Jalankan Seeder
```bash
$ php artisan db:seed
```
Install Passport Client Token
```bash
$ php artisan passport:install
```

jangan lupa untuk menjalankan server laravel untuk memulai.
```bash
$ php artisan serve
```

# 2. Testing API menggunakan Postman

## List Of Movies
Buka tab request baru, lalu masukkan url http://127.0.01:8000/api/movies, lalu ubahlah methodnya menjadi *GET*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*, Run.

Jika Berhasil
```bash
$ [
    {
        "id": 1,
        "title": "Pengabdi Setan Comunion",
        "description": "dalah sebuah film horor Indonesia tahun 2022 yang disutradarai dan ditulis oleh Joko Anwar sebagai sekuel dari film tahun 2017, Pengabdi Setan.",
        "rating": "7",
        "image": "setan.jpg",
        "created_at": "2024-01-06T10:27:34.000000Z",
        "updated_at": "2024-01-06T10:27:34.000000Z"
    },
    {
        "id": 2,
        "title": "Pengabdi Setan",
        "description": "dalah sebuah film horor Indonesia tahun 2022 yang disutradarai dan ditulis oleh Joko Anwar sebagai sekuel dari film tahun 2017, Pengabdi Setan.",
        "rating": "7",
        "image": "setan2.jpg",
        "created_at": "2024-01-06T10:27:34.000000Z",
        "updated_at": "2024-01-06T10:27:34.000000Z"
    }
]
```

## Details of Movie
Buka tab request baru, lalu masukkan url http://127.0.0.1:8000/api/movie/:id, lalu ubahlah methodnya menjadi *GET*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*, Run.

Tuliskan: 
```bash
$ {
    "id" : "1" //Id dari movie yang ingin di GET
  }
```

## Add new movie
Buka tab request baru, lalu masukkan url http://127.0.0.1:8000/api/movie, lalu ubahlah methodnya menjadi *POST*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*, 

Tuliskan:
```bash
$ {
    "title" : "Ganteng ganteng dandy",
    "description" : "dandy",
    "rating"   : "10",
    "image" : "dandy.jpg"
}
```
Jika Berhasil : 
```bash
$ {
   "status": "success",
    "message": {
        "title": "Ganteng ganteng dandy",
        "description": "dandy",
        "rating": "10",
        "image": "dandy.jpg",
        "created_at": "2024-01-06T11:13:55.000000Z",
        "updated_at": "2024-01-06T11:13:55.000000Z",
        "id": 5
    }
}
```
## Update Data User
Buka tab request baru, lalu masukkan url http://127.0.0.1:8000/api/movie/:id, lalu ubahlah methodnya menjadi *PUT*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*,

Tuliskan: 
```bash
$ {
    "id" :"5", //dari movie yang ingin di update
    "title" : "Keren keren dandy",
    "description" : "dandy keren",
    "rating"   : "10",
    "image" : "dandy.jpg"
}
```
Jika Berhasil : 
```bash
$ {
    "status": "success",
    "message": {
        "id": 5,
        "title": "Keren keren dandy",
        "description": "dandy keren",
        "rating": "10",
        "image": "dandy.jpg",
        "created_at": "2024-01-06T11:13:55.000000Z",
        "updated_at": "2024-01-06T11:15:35.000000Z"
    }
}
```
## Delete User
Buka tab request baru, lalu masukkan url http://127.0.0.1:8000/api/, lalu ubahlah methodnya menjadi *DELETE*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*,

Tuliskan: 
```bash
$ {
    "id" : "5" //id movie yg ingin di hapus
}
```

Jika Berhasil : 
```bash
$ {
    "status": "success"
}
```
