# 0. Pengertian dan Perbedaan antara API, REST API, dan RESTful API
API adalah sebuah software yang mengintegrasikan antara aplikasi yang kita buat dengan aplikasi yang lain. Tujuan pembuatannya yaitu untuk saling berbagi data antar aplikasi   yang sudah diintegrasikan tersebut.

Sedangkan REST API merupakan salah satu dari desain arsitektur yang terdapat di dalam API itu sendiri. Dan cara kerja dari RESTful API yaitu REST client akan Melakukan akses     pada data/resource pada REST server dimana masing-masing resource. Atau data/resource tersebut akan dibedakan oleh sebuah global ID atau URIs (Universal Resource Identifiers).

Jadi, Nantinya data yang diberikan oleh REST server itu bisa berupa format text, JSON atau XML. Dan saat ini format yang paling populer dan paling banyak digunakan adalah       format JSON.

* Adapun metode HTTP yang secara umum dipakai dalam REST api adalah:
```bash
$ POST, berfungsi untuk membuat sebuah data/resource baru di REST server
```
```bash
$ PUT, berfungsi untuk memperbaharui data/resource di REST server
```
```bash
$ DELETE, berfungsi untuk menghapus data/resource dari REST serve
```
```bash
$ OPTIONS, berfungsi untuk mendapatkan operasi yang disupport pada resource dari REST server.
```

# 1. Jenis Jenis Web API 

1. REST (RESTful) API
singkatan dari transfer status representasional dan mengirimkan data menggunakan format JSON yang ringan. Sebagian besar API publik menggunakan ini karena kinerjanya yang cepat, dapat diandalkan dan kemampuan untuk menskalakan dengan menggunakan kembali komponen modular tanpa mempengaruhi sistem secara keseluruhan.

2. SOAP (Simple Object Access Protocol)
Simple Object Access Protocol sedikit lebih rumit daripada REST karena memerlukan lebih banyak informasi tentang cara mengirim pesannya. API ini telah ada sejak akhir 1990-an dan menggunakan XML untuk mentransfer data. Ini membutuhkan aturan ketat dan keamanan tingkat lanjut yang membutuhkan lebih banyak bandwidth.
Protokol ini tidak memiliki kemampuan untuk melakukan cache, memiliki komunikasi yang ketat dan membutuhkan setiap informasi tentang interaksi sebelum panggilan apa pun dianggap diproses.

3. XML-RPC (eXtensible Markup Language ??? Remote Procedure Call)
Dikenal sebagai bahasa markup yang dapat dikembangkan ??? Panggilan Prosedur Jarak Jauh. Protokol ini menggunakan format XML tertentu untuk mentransfer data dan lebih tua dan lebih sederhana dari SOAP. Klien melakukan RPC dengan mengirim permintaan HTTP ke server yang mengimplementasikan XML-RPC dan menerima respons HTTP.

4. JSON-RPC
Mirip dengan XML-RPC karena keduanya bekerja dengan cara yang sama kecuali protokol ini menggunakan JSON dan bukan format XML. Klien biasanya perangkat lunak yang memanggil metode tunggal dari sistem jarak jauh.

# 2. Setup
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

jangan lupa untuk menjalankan server laravel untuk memulai.
```bash
$ php artisan serve
```


# 3. Testing API menggunakan Postman

## Register User 
Buka aplikasi postman kalian, Buka tab request baru, lalu masukkan url http://127.0.01:8000/api/register, lalu ubahlah methodnya menjadi *POST*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*,

Tuliskan: *name, email dan password. Isi sesuai dengan data yg ingin kalian buat*
```bash
$ {
    "name" : "dandy112", 
    "email" : "dandy112@gmail.com",
    "password" : "123456"
  }
```
Jika Berhasil: 
```bash
$ {
    "status_code": 200,
    "message": "Berhasil"
  }
```
Jika Gagal :
```bash
$ {
    "status_code": 400,
    "message": "Gagal"
  }
```
## Login User
Buka tab request baru, lalu masukkan url http://127.0.01:8000/api/login, lalu ubahlah methodnya menjadi *POST*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*,

Tuliskan: *Isi sesuai dengan data yg kalian buat*
```bash
$ {
    "name" : "dandy112", 
    "email" : "dandy112@gmail.com",
    "password" : "123456"
  }
```
Jika Berhasil:
```bash
$ {
    "success": true,
    "user": {
        "id": 4,
        "name": "DANDY112",
        "email": "dandy112@gmail.com",
        "email_verified_at": null,
        "created_at": "2021-04-24T07:23:10.000000Z",
        "updated_at": "2021-04-24T07:23:10.000000Z"
    },
    "token": "12|Lvm66FZHiuHX6zrBteL0vZMrQPWT24QlOCwefPfC"
  }
```
Jika Gagal :
```bash
$ {
    "success": false,
    "message": [
        "Email atau Password salah"
    ]
  }
```
## Menampilkan List User
Buka tab request baru, lalu masukkan url http://127.0.01:8000/api/user, lalu ubahlah methodnya menjadi *GET*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab *Authorization* pilih *Type : Bearer Token* lalu isi dengan token yg di dapatkan ketika proses login. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*, Run.

Jika Berhasil: List User akan muncul sesuai dengan data yang sudah anda buat.
```bash
$ [
    [
        {
            "id": 1,
            "name": "DANDY",
            "email": "dandy@gmail.com",
            "email_verified_at": null,
            "created_at": "2021-04-24T07:17:36.000000Z",
            "updated_at": "2021-04-24T07:17:36.000000Z"
        },
        {
            "id": 3,
            "name": "DANDY1",
            "email": "dandy1@gmail.com",
            "email_verified_at": null,
            "created_at": "2021-04-24T07:18:13.000000Z",
            "updated_at": "2021-04-24T07:18:13.000000Z"
        },
        {
            "id": 4,
            "name": "DANDY112",
            "email": "dandy112@gmail.com",
            "email_verified_at": null,
            "created_at": "2021-04-24T07:23:10.000000Z",
            "updated_at": "2021-04-24T07:23:10.000000Z"
        }
    ]
]
```
## Input Data Tambah User
Buka tab request baru, lalu masukkan url http://127.0.01:8000/api/user/store, lalu ubahlah methodnya menjadi *POST*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab *Authorization* pilih *Type : Bearer Token* lalu isi dengan token yg di dapatkan ketika proses login. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*, 

Tuliskan: *Isi sesuai dengan data yg kalian buat*
```bash
$ {
    "name" : "DANDYAPI",
    "email" : "dandyAPI@gmail.com",
    "password" : "12345678"
  }
```
Jika Berhasil : Check di database anda apakah user baru yang anda input sudah ada di database yang anda buat.
```bash
$ {
    "Post Berhasil Disimpan"
  }
```
## Update Data User
Buka tab request baru, lalu masukkan url http://127.0.01:8000/api/user/update/id, gantilah id dengan angka yang sesuai dengan *id user*, *anda bisa melihat id user di List User yg sudah kita tampilkan di tab *Menampilkan User* atau anda bisa langsung melihatnya di database*, lalu ubahlah methodnya menjadi *POST*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab *Authorization* pilih *Type : Bearer Token* lalu isi dengan token yg di dapatkan ketika proses login. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*,

Tuliskan: *Isi sesuai dengan data yg kalian buat*
```bash
$ {
    "name" : "DandyUpdate",
    "email" : "dandyUpdate@gmail.com",
    "password" : "12345678"
  }
```
Jika Berhasil : Check di database anda apakah user yang anda update sudah ter update di database yang anda buat.
```bash
$ {
    "Post Berhasil Disimpan"
  }
```
## Delete User
Buka tab request baru, lalu masukkan url http://127.0.01:8000/api/user/delete/id, gantilah id dengan angka yang sesuai dengan *id user* yang ingin anda hapus *anda bisa melihat id user di List User yg sudah kita tampilkan di tab *Menampilkan User* atau anda bisa langsung melihatnya di database*, lalu ubahlah methodnya menjadi *DELETE*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab *Authorization* pilih *Type : Bearer Token* lalu isi dengan token yg di dapatkan ketika proses login. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*,
Jika Berhasil : Check di database anda apakah user yang anda delete sudah ter delete di database yang anda buat.
```bash
$ {
    "Berhasil Menghapus Data"
  }
```
