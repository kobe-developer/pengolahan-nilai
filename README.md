<h1>Pengolahan Nilai</h1>

<p>Pengolahan Nilai sebagai tugas akhir semester 7 - 2023 s.d 2024</p>

<h1>Spesifikasi</h1>
<ul>
  <li>Laravel 10</li>
  <li>PHP 8.1</li>
  <li>MySql</li>
</ul>

<h1>Team Backend</h1>
<ol>
  <li>Andri Wijaya - 14021800022</li>
  <li>Linda saraswati - 14022000014</li>
  <li>Yulisa - 14022000008</li>
  <li>Achmad Farhan fauzan - 14022000060</li>
  <li>Cici ratnasari - 14022300105</li>
</ol>

<h1>Team Frontend</h1>
<ol>
  <li>Wildan Saptanzani - 14022000070</li>
  <li>Elang Diraja Andawa - 14022000076</li>
  <li>Wahyu Cahyadi - 14022000018</li>
  <li>Sheli Seftia utami - 14022300103</li>
  <li>Susanti sipahutar  - 14022300104</li>
  <li>Rizky Arif Perdana  - 14022200149</li>
  <li>Wahyu Darma Putra  - 14022000044</li>
</ol>

# Setting Database

1. Copy file `.env.example` menjadi `.env`.
2. Rubah konfigurasi database sebagai berikut:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pengolahan_nilai
DB_USERNAME=root
DB_PASSWORD=
```

<h1>Cara Install</h1>
<ul>
  <li>install dependency : <code>composer update</code></li>
  <li>migrasi database : <code>php artisan migrate --seed</code></li>
  <li>Jalankan server : <code>php artisan serve</code></li>
  <li>Buka browser dan akses : <code>http://127.0.0.1:8000</code></li>
</ul>

# Endpoint

<p>Beberapa aturan yang diterapkan di sistem adalah authorize user. dimana user dibagi menjadi 3 bagian yaitu : 
<ol>
  <li>Adminstrator</li>
  <li>Dosen</li>
  <li>Mahasiswa</li>
</ol>
Setiap penambahan dosen akan tergenerate data user sesuai dengan input. begitu pula dengan mahasiswa. hal ini dimudahkan untuk memberi autentikasi berdasarkan user login.
berikut ketentuan user login pada sistem.
</p>

## User

### Login

-   METHOD : `POST`
-   URL: `http://127.0.0.1:8000/api/user/validate`
-   Body:
    ```json
    {
        "username": "username",
        "password": "password"
    }
    ```
-   Response:

    ```json
    {
        "status": true,
        "message": "Login berhasil",
        "data": {
            "id": 1,
            "username": "rhardiansyah",
            "nickname": "Halima Namaga",
            "email": "balamantri.farida@narpati.co",
            "email_verified_at": null,
            "role": {
                "id": 1,
                "role_name": "Administrator"
            },
            "access_value": null,
            "created_at": "2023-12-09T06:01:55.000000Z",
            "updated_at": "2023-12-09T06:01:55.000000Z",
            "token": "1|IcIQZCRbgjfqSH9AqdC9T4eK8VSE5P0tzLta55Nc154544ed"
        }
    }
    ```

### Logout

-   METHOD : `DELETE`
-   URL: `http://127.0.0.1:8000/api/user/logout`
-   HEADERS:
    ```json
    {
        "Authorization": "Bearer {{ token }}"
    }
    ```

### Cek User

-   METHOD : `GET`
-   URL: `http://127.0.0.1:8000/api/user`
-   HEADERS:
    ```json
    {
        "Authorization": "Bearer {{ token }}"
    }
    ```

## Ketentuan Penggunaan

<ul>
    <li>
        Setiap request yang dikirimkan user wajib memberikan <code>token</code> pada bagian headers. seperti yang dilakukan pada enpoint <code>Cek User</code> dan  <code>Logout</code>
    </li>
    <li>
        Pada bagian headers <code>Accept</code> value dengan <code>application/json</code>
    </li>
    <li> lihat pada code dibawah </li>
</ul>

##

-   HEADERS:
    ```json
    {
        "Authorization": "Bearer {{ token }}",
        "Accept": "application/json"
    }
    ```

## Mahasiswa

### Get Data

-   METHOD : `GET`
-   URL: `http://127.0.0.1:8000/api/mahasiswa`

### Tambah Data

-   METHOD : `POST`
-   URL: `http://127.0.0.1:8000/api/mahasiswa`
-   Body:
    ```json
    {
        "nim": "1402200001",
        "nama": "Andri Wijaya",
        "jenis_kelamin": "P", // P (perempuan) / L (laki-laki)
        "alamat": "alamat mahasiswa",
        "nomor_hp": "nomor hp",
        "email": "email mahasiswa",
        "id_kelas": "8", // id kelas pada table kelas
        "id_prodi": "1", // id prodi pada table prodi
        "tahun_masuk": "2023"
    }
    ```

### Update Data

-   METHOD : `PUT`
-   URL: `http://127.0.0.1:8000/api/mahasiswa/{id_mhs}`
-   Body:
    ```json
    {
        "nim": "1402200001",
        "nama": "Andri Wijaya",
        "jenis_kelamin": "P", // P (perempuan) / L (laki-laki)
        "alamat": "alamat mahasiswa",
        "nomor_hp": "nomor hp",
        "email": "email mahasiswa",
        "id_kelas": "8", // id kelas pada table kelas
        "id_prodi": "1", // id prodi pada table prodi
        "tahun_masuk": "2023"
    }
    ```

### Hapus Data

-   METHOD : `DELETE`
-   URL: `http://127.0.0.1:8000/api/mahasiswa/{id_mhs}`

## Dosen

### Get Data

-   METHOD : `GET`
-   URL: `http://127.0.0.1:8000/api/dosen`

### Tambah Data

-   METHOD : `POST`
-   URL: `http://127.0.0.1:8000/api/dosen`
-   Body:
    ```json
    {
        "nip": "1402200001",
        "nama": "Andri Wijaya",
        "jenis_kelamin": "P", // P (perempuan) / L (laki-laki)
        "alamat": "alamat dosen",
        "email": "email dosen",
        "id_prodi": "1", // id prodi pada table prodi
        "img_src": "https://via.placeholder.com/640x480.png/004488?text=qui"
    }
    ```

### Update Data

-   METHOD : `PUT`
-   URL: `http://127.0.0.1:8000/api/dosen/{dosen_id}`
-   Body:
    ```json
    {
        "nip": "1402200001",
        "nama": "Andri Wijaya",
        "jenis_kelamin": "P", // P (perempuan) / L (laki-laki)
        "alamat": "alamat dosen",
        "email": "email dosen",
        "id_prodi": "1", // id prodi pada table prodi
        "img_src": "https://via.placeholder.com/640x480.png/004488?text=qui"
    }
    ```

### Hapus Data

-   METHOD : `DELETE`
-   URL: `http://127.0.0.1:8000/api/dosen/{dosen_id}`

## Kelas

### Get Data

-   METHOD : `GET`
-   URL: `http://127.0.0.1:8000/api/kelas`

### Tambah Data

-   METHOD : `POST`
-   URL: `http://127.0.0.1:8000/api/kelas`
-   Body:
    ```json
    {
        "name": "7D-BIS"
    }
    ```

### Update Data

-   METHOD : `PUT`
-   URL: `http://127.0.0.1:8000/api/kelas/{kelas_id}`
-   Body:
    ```json
    {
        "name": "7D-BIS"
    }
    ```

### Hapus Data

-   METHOD : `DELETE`
-   URL: `http://127.0.0.1:8000/api/kelas/{kelas_id}`

## Mata Kuliah

### Get Data

-   METHOD : `GET`
-   URL: `http://127.0.0.1:8000/api/mata-kuliah`

### Tambah Data

-   METHOD : `POST`
-   URL: `http://127.0.0.1:8000/api/mata-kuliah`
-   Body:

    ```json
    {
        "nama_mk": "Nama Mata Kuliah",
        "sks": "2",
        "stmt": "8",
        "dosen_nip": "nip dosen" // table dosen nip
    }
    ```

### Update Data

-   METHOD : `PUT`
-   URL: `http://127.0.0.1:8000/api/mata-kuliah/{matakuliah_id}`
-   Body:
    ```json
    {
        "nama_mk": "Nama Mata Kuliah",
        "sks": "2",
        "stmt": "8",
        "dosen_nip": "nip dosen" // table dosen nip
    }
    ```

### Hapus Data

-   METHOD : `DELETE`
-   URL: `http://127.0.0.1:8000/api/mata-kuliah/{matakuliah_id}`

## Prodi (Program Studi)

### Get Data

-   METHOD : `GET`
-   URL: `http://127.0.0.1:8000/api/prodi`

### Tambah Data

-   METHOD : `POST`
-   URL: `http://127.0.0.1:8000/api/prodi`
-   Body:

    ```json
    {
        "fakultas": "Nama fakultas",
        "jurusan": "Nama Jurusan"
    }
    ```

### Update Data

-   METHOD : `PUT`
-   URL: `http://127.0.0.1:8000/api/prodi/{prodi_id}`
-   Body:
    ```json
    {
        "fakultas": "Nama fakultas",
        "jurusan": "Nama Jurusan"
    }
    ```

### Hapus Data

-   METHOD : `DELETE`
-   URL: `http://127.0.0.1:8000/api/prodi/{prodi_id}`

## Nilai Mahasiswa

### Get Data

-   METHOD : `GET`
-   URL: `http://127.0.0.1:8000/api/nilai`

### Tambah Data

-   METHOD : `POST`
-   URL: `http://127.0.0.1:8000/api/nilai`
-   Body:

    ```json
    {
        "mhs_nim": "1402200002", // table mhs nim
        "id_mk": "1", // table mk id
        "nilai_uts": "89",
        "nilai_tugas": "70",
        "nilai_uas": "90",
        "presensi": "100"
    }
    ```

### Update Data

-   METHOD : `PUT`
-   URL: `http://127.0.0.1:8000/api/nilai/{nilai_id}`
-   Body:
    ```json
    {
        "mhs_nim": "1402200002", // table mhs nim
        "id_mk": "1", // table mk id
        "nilai_uts": "89",
        "nilai_tugas": "70",
        "nilai_uas": "90",
        "presensi": "100"
    }
    ```

### Hapus Data

-   METHOD : `DELETE`
-   URL: `http://127.0.0.1:8000/api/nilai/{nilai_id}`
