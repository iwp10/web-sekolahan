# Web Informasi Sekolah 🏫

Sistem Informasi Profil Sekolah modern yang dibangun menggunakan **Laravel 11**, **Filament PHP v3** untuk panel admin, dan **Supabase PostgreSQL** sebagai database-nya.

Proyek ini dirancang untuk membantu sekolah menampilkan profil, berita, direktori guru, dan kegiatan ekstrakurikuler secara online, lengkap dengan panel admin untuk mengelola konten tanpa perlu menyentuh kode.

---

## 📋 Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Prasyarat](#-prasyarat)
- [Cara Instalasi](#️-cara-instalasi-local-development)
- [Menjalankan Aplikasi](#-menjalankan-aplikasi)
- [Struktur Proyek](#-struktur-proyek)
- [Kontribusi](#-kontribusi)

---

## ✨ Fitur Utama

- **Halaman Publik Terspesialisasi** — Menampilkan Profil Sekolah, Direktori Guru, Berita/Artikel, dan Daftar Ekstrakurikuler.
- **Layanan Kontak** — Formulir "Hubungi Kami" yang terintegrasi langsung ke dashboard admin.
- **Admin Dashboard (Filament)** — Panel admin yang cantik dan responsif untuk mengelola seluruh konten website (CRUD: Create, Read, Update, Delete).
- **Database Supabase** — Menggunakan PostgreSQL dari Supabase untuk performa dan skalabilitas tinggi.

## 🚀 Teknologi yang Digunakan

| Teknologi | Fungsi |
|---|---|
| [Laravel 11](https://laravel.com) | Framework backend PHP |
| [Filament v3](https://filamentphp.com) | Panel admin |
| [Supabase](https://supabase.com) | Database PostgreSQL |
| Tailwind CSS | Styling frontend |

## ✅ Prasyarat

Pastikan sistem kamu sudah memiliki:

- PHP >= 8.2
- Composer
- Node.js & NPM
- Akun [Supabase](https://supabase.com) (untuk database PostgreSQL)

## 🛠️ Cara Instalasi (Local Development)

1. **Clone repository ini**
   ```bash
   git clone https://github.com/iwp10/web-sekolahan.git
   cd web-sekolahan
   ```

2. **Install dependency PHP (Composer)**
   ```bash
   composer install
   ```

3. **Install dependency JavaScript (NPM)**
   ```bash
   npm install
   ```

4. **Salin file environment**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Atur koneksi database Supabase**

   Buka file `.env`, lalu isi kredensial database PostgreSQL dari Supabase:
   ```env
   DB_CONNECTION=pgsql
   DB_HOST=your-supabase-host
   DB_PORT=5432
   DB_DATABASE=postgres
   DB_USERNAME=your-username
   DB_PASSWORD=your-password
   ```

7. **Jalankan migration database**
   ```bash
   php artisan migrate
   ```

8. **(Opsional) Jalankan seeder** jika tersedia, untuk mengisi data contoh:
   ```bash
   php artisan db:seed
   ```

9. **Buat akun admin Filament** (jika belum ada seeder untuk user)
   ```bash
   php artisan make:filament-user
   ```

## ▶️ Menjalankan Aplikasi

1. **Compile asset frontend**
   ```bash
   npm run dev
   ```

2. **Jalankan server Laravel** (di terminal terpisah)
   ```bash
   php artisan serve
   ```

3. Buka aplikasi di browser:
   - **Halaman publik**: `http://localhost:8000`
   - **Panel admin**: `http://localhost:8000/admin` (login dengan akun yang dibuat di langkah instalasi #9)

## 📁 Struktur Proyek

```
web-sekolahan/
├── app/            # Logika aplikasi (Models, Controllers, Filament Resources)
├── bootstrap/      # File bootstrap framework
├── config/         # File konfigurasi
├── database/       # Migration, seeder, factory
├── public/         # Entry point & asset publik
├── resources/      # View, CSS, JS
├── routes/         # Definisi route
├── storage/        # File upload, cache, log
└── tests/          # Automated test
```

## 🤝 Kontribusi

Pull request sangat diterima. Untuk perubahan besar, silakan buka issue terlebih dahulu untuk mendiskusikan apa yang ingin diubah.

## 📄 Lisensi

Belum ditentukan — tambahkan file `LICENSE` jika ingin membuka proyek ini di bawah lisensi tertentu (misalnya MIT).