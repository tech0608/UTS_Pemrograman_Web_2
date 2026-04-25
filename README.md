# Sistem Akademik Sederhana

Proyek **Sistem Akademik Sederhana** ini dibuat untuk memenuhi tugas **Ujian Tengah Semester (UTS)** Pemrograman Web. Aplikasi ini dibangun dengan menggunakan **Laravel 12** dan **MySQL**, serta memanfaatkan komponen antarmuka dari **Bootstrap 5**.

## Fitur Utama

- **Autentikasi (Login Wajib)**: Pengguna harus login untuk mengakses fitur CRUD.
- **Manajemen Jurusan**: Create, Read, Update, Delete data jurusan.
- **Manajemen Mahasiswa**: Create, Read, Update, Delete data mahasiswa yang terelasi dengan tabel jurusan.
- **Manajemen Matakuliah**: Create, Read, Update, Delete data matakuliah yang terelasi dengan tabel jurusan.
- **Validasi Data**: Setiap form input memiliki validasi untuk memastikan data yang dimasukkan benar.
- **Pagination & Pencarian**: Menampilkan daftar data dengan fitur halaman (pagination) dan pencarian agar lebih efisien.
- **UI Bootstrap 5**: Seluruh tampilan *dashboard* dan halaman CRUD dirancang bersih dan ringkas menggunakan integrasi Bootstrap.

## Dokumentasi Screenshot

Berikut adalah tangkapan layar (screenshot) dari sistem ini sesuai dengan ketentuan UTS:

### 1. Halaman Login
![Screenshot Login](screenshots/login.png)

### 2. Dashboard
![Screenshot Dashboard](screenshots/dashboard.png)

### 3. CRUD Jurusan
![Screenshot Jurusan](screenshots/jurusan.png)

### 4. CRUD Mahasiswa
![Screenshot Mahasiswa](screenshots/mahasiswa.png)

### 5. CRUD Matakuliah
![Screenshot Matakuliah](screenshots/matakuliah.png)

> **Catatan untuk Mahasiswa**: Silakan ambil screenshot aplikasi di browser Anda dan simpan ke dalam folder `screenshots/` di dalam direktori proyek ini dengan nama file sesuai di atas.

## Prasyarat (Requirements)

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL Database Server

## Cara Instalasi

1. **Clone repositori ini atau salin folder proyek ke lokal Anda**:
   ```bash
   git clone <link-repo-anda>
   cd akademik
   ```

2. **Install dependensi PHP & Node.js**:
   ```bash
   composer install
   npm install
   ```

3. **Salin file konfigurasi environment**:
   ```bash
   cp .env.example .env
   ```
   Pastikan pada `.env` Anda sudah mengatur koneksi ke database Anda:
   ```env
   DB_DATABASE=sistem_akademik
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Jalankan Migrasi & Seeder Database**:
   Langkah ini akan membuatkan struktur tabel serta mengisikan data contoh (*dummy data*) beserta akun akses administrator.
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Kompilasi Aset Frontend (Vite)**:
   ```bash
   npm run build
   ```

7. **Jalankan Server Lokal**:
   ```bash
   php artisan serve
   ```
   Aplikasi Anda kini berjalan di `http://127.0.0.1:8000/`.

## Data Login Bawaan (Seeder)

Anda bisa menggunakan akun berikut yang otomatis terbuat melalui seeder untuk mencoba aplikasi:
- **Email:** `admin@test.com`
- **Password:** `password`

## Relasi Database

Proyek ini mendemonstrasikan implementasi *Eloquent Relationship* berikut:
1. `Jurusan` *hasMany* `Mahasiswa` (1 Jurusan memiliki banyak Mahasiswa)
2. `Jurusan` *hasMany* `Matakuliah` (1 Jurusan memiliki banyak Matakuliah)
3. `Mahasiswa` *belongsTo* `Jurusan` (1 Mahasiswa memiliki 1 Jurusan)
4. `Matakuliah` *belongsTo* `Jurusan` (1 Matakuliah memiliki 1 Jurusan)
