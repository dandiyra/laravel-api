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

## Login User
Buka tab request baru, lalu masukkan url http://127.0.01:8000/api/login, lalu ubahlah methodnya menjadi *POST*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*,

Default User :
Username    : sadmin
Passwordd   : admin123
```bash
$ {
   "username" : "sadmin",
   "password" : "admin123"
  }
```
Jika Berhasil:
```bash
$ {
    "accessToken": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiYzBiODdjNTlkMTY2MmU2NTdmYjY2YzZjN2M2N2ZjZTk0ZWEwOGM4YmUzZjQ2MTY1Njc0MDZkMDU5MzQwMzZlMzU5NmY3OTFkYTcwOWU3MTYiLCJpYXQiOjE2NjQ5MDM4OTEuMTc4NTkzLCJuYmYiOjE2NjQ5MDM4OTEuMTc4NTk2LCJleHAiOjE2ODA2Mjg2OTEuMTY5MTUsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.rpgc-W31xfHrz8v_nWwyA-qK5D6zxuojtUrOagDrzCxxAvMEhToRaFyzts1uK8eEsixHXSPrMQHHUzp5QOtDicQDLO-AFlMUKdx3Vp19YK4hMF82LhjUMVaW8iaYr9TRJGUMhrFI_gnqpI-AfqWIcUpYhS-jKyEyfaR5SOOcNTBlArEfjcKJ4GCQ8M92m4wf_mg1hC2H1A0lpCZjvURPpeMJCM0StSai3lDjIKRVJ52WNPC9fxrnNjrpfCZG6VU6tzdMfpv3vAC3IYmgAzlFFgeM4OsGxkSH6ppG11va1T6v4X9CEL84bvKGivm5O_f-CL3ama4M0ZgxJ3VMDZYasSGdc8bkDQ7ijEd80-xqi1DHZ91Uk0g7ZT_flMQxe-aEDe8ZVkyVzOQh3A7YTFTNSnKG02trY-q2ojIenNp1x3mWEfCjWOoFcN0wQwfohBrdSCVmQfBi_ki2p40lgxl-ouqp46hhxdBHeZC1aSXISRu_rJGH7wDa0ci7x2B6wFeml1_pJBSPygN_rVcxID7pDvIiy7AWNWNDS8d-4QIV42ucCbG2nYnGwvnPJT5MwzE21hNIGEWwNKJmeq477tAuOZsDpU5z2FcTMxSTaPSh4awzk-1jdo4zeQZBuISMRFvBaWyR59zz90GTgaUePUhDcx_yOqf0nkRkoe53HdSxmnY",
    "user": {
        "id": 1,
        "full_name": "superadmin",
        "username": "sadmin",
        "phone_number": "834227349",
        "date_of_birth": "1998-09-14",
        "age": "24",
        "created_at": null,
        "updated_at": null
    }
  }
```
Jika Gagal :
```bash
$ {
   "error": "Unauthorised"
  }
```
## Get All User
Buka tab request baru, lalu masukkan url http://127.0.01:8000/api/user, lalu ubahlah methodnya menjadi *GET*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab *Authorization* pilih *Type : Bearer Token* lalu isi dengan token yg di dapatkan ketika proses login. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*, Run.

Jika Berhasil
```bash
$ [
    {
        "id": 1,
        "full_name": "superadmin",
        "username": "sadmin",
        "phone_number": "834227349",
        "date_of_birth": "1998-09-14",
        "age": "24",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "full_name": "Dandy Yudistira",
        "username": "dandiyra",
        "phone_number": "834227349",
        "date_of_birth": "1998-09-14",
        "age": "24",
        "created_at": null,
        "updated_at": null
    }
]
```

## Get User By ID
Buka tab request baru, lalu masukkan url http://127.0.0.1:8000/api/user/id, lalu ubahlah methodnya menjadi *GET*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab *Authorization* pilih *Type : Bearer Token* lalu isi dengan token yg di dapatkan ketika proses login. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*, Run.

Tuliskan: 
```bash
$ {
    "id" : "1" //Id dari user yang ingin di GET
  }
```

## Input Data Tambah User
Buka tab request baru, lalu masukkan url http://127.0.0.1:8000/api/user, lalu ubahlah methodnya menjadi *POST*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab *Authorization* pilih *Type : Bearer Token* lalu isi dengan token yg di dapatkan ketika proses login. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*, 

Tuliskan:
```bash
$ {
    "full_name" : "Dandy Test",
    "username" : "dandytest@gmail.com",
    "password" : "admin123",
    "phone_number" : "0895336420201",
    "date_of_birth" : "1998-09-07",
    "age" : "1"
}
```
Jika Berhasil : 
```bash
$ {
    "status": "success",
    "message": {
        "full_name": "Dandy Test",
        "username": "dandytest@gmail.com",
        "phone_number": "0895336420201",
        "date_of_birth": "1998-09-07",
        "age": "1",
        "updated_at": "2022-10-04T17:42:49.000000Z",
        "created_at": "2022-10-04T17:42:49.000000Z",
        "id": 4
    }
}
```
## Update Data User
Buka tab request baru, lalu masukkan url http://127.0.0.1:8000/api/user, lalu ubahlah methodnya menjadi *PUT*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab *Authorization* pilih *Type : Bearer Token* lalu isi dengan token yg di dapatkan ketika proses login. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*,

Tuliskan: 
```bash
$ {
    "id" : "4", //id dari user yg ingin di update
    "full_name" : "Dandy Test Berhasil",
    "username" : "dandytest@gmail.com",
    "password" : "admin123",
    "phone_number" : "0895336420201",
    "date_of_birth" : "1998-09-07",
    "age" : "1"
}
```
Jika Berhasil : 
```bash
$ {
    "status": "success",
    "message": {
        "id": 4,
        "full_name": "Dandy Test Berhasil",
        "username": "dandytest@gmail.com",
        "phone_number": "0895336420201",
        "date_of_birth": "1998-09-07",
        "age": "1",
        "created_at": "2022-10-04T17:42:49.000000Z",
        "updated_at": "2022-10-04T17:46:00.000000Z"
    }
}
```
## Delete User
Buka tab request baru, lalu masukkan url http://127.0.0.1:8000/api/user, lalu ubahlah methodnya menjadi *DELETE*. Kemudian klik tab Headers Lalu tambahkan *key: Accept* dengan *value: application/json*. Kemudian klik tab *Authorization* pilih *Type : Bearer Token* lalu isi dengan token yg di dapatkan ketika proses login. Kemudian klik tab Body lalu pilih *raw* dengan format *JSON*,

Tuliskan: 
```bash
$ {
    "id" : "4" //id user yg ingin di hapus
}
```

Jika Berhasil : 
```bash
$ {
    "status": "success"
}
```
