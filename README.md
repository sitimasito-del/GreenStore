# GreenStore

GreenStore merupakan aplikasi berbasis web yang dikembangkan menggunakan **Laravel 12** sebagai sistem informasi pendakian gunung yang terintegrasi dengan marketplace perlengkapan outdoor. Aplikasi ini menyediakan informasi gunung, artikel edukasi, sistem pelaporan pendakian, serta marketplace yang mendukung proses pemesanan produk melalui WhatsApp.

##  Demo Aplikasi

https://greenstore.iwakqu.biz.id

---

# Teknologi yang Digunakan

- Laravel 12
- PHP 8.2+
- MySQL
- Bootstrap 5
- HTML, CSS, JavaScript
- Shared Hosting (cPanel)
- GitHub

---

# Fitur Aplikasi

## User

- Login
- Register
- Melihat daftar gunung
- Melihat detail gunung
- Membuat laporan pendakian
- Melihat riwayat laporan
- Membaca artikel
- Melihat marketplace
- Melihat detail produk
- Keranjang belanja
- Checkout melalui WhatsApp
- Pencarian produk
- Filter kategori

---

## Admin Gunung

- Login Admin Gunung
- Melihat laporan pendakian
- Mengubah status laporan
- Mengelola data laporan pendakian

---

## Admin Artikel

- Login Admin Artikel
- Dashboard Artikel
- Menambah artikel
- Mengedit artikel
- Menghapus artikel

---

## Admin Market

- Login Admin Market
- Dashboard Market
- Menambah produk
- Mengedit produk
- Menghapus produk
- Upload gambar produk
- Mengelola stok produk
- Melihat total produk
- Melihat total stok

---

## Admin Pusat

- Dashboard Admin
- Mengelola data gunung
- Menambah data gunung
- Mengedit data gunung
- Melihat rekap laporan
- Mengelola administrator

---

# Struktur Project

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
```

---

# Cara Menjalankan di Lokal

## 1. Clone Repository

```bash
git clone https://github.com/sitimasito-del/GreenStore.git
```

## 2. Masuk ke Folder Project

```bash
cd GreenStore
```

## 3. Install Dependency

```bash
composer install
```

## 4. Copy File Environment

Windows

```bash
copy .env.example .env
```

Linux / macOS

```bash
cp .env.example .env
```

## 5. Generate Application Key

```bash
php artisan key:generate
```

## 6. Konfigurasi Database

Sesuaikan file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=greenstore
DB_USERNAME=root
DB_PASSWORD=
```

## 7. Jalankan Migration

```bash
php artisan migrate
```

## 8. Jalankan Seeder (Jika Ada)

```bash
php artisan db:seed
```

## 9. Storage Link

```bash
php artisan storage:link
```

## 10. Jalankan Server

```bash
php artisan serve
```

Akses aplikasi melalui

```
http://127.0.0.1:8000
```

---

# Ringkasan Deployment

Aplikasi GreenStore dideploy menggunakan **Shared Hosting berbasis cPanel**.

Tahapan deployment yang dilakukan meliputi:

1. Push source code ke GitHub.
2. Membuat subdomain pada cPanel.
3. Upload source code Laravel melalui File Manager.
4. Mengekstrak file project.
5. Membuat database MySQL melalui MySQL Database Wizard.
6. Mengimpor database menggunakan phpMyAdmin.
7. Mengubah konfigurasi file `.env`.
8. Mengatur Document Root atau file `.htaccess` agar mengarah ke folder `public`.
9. Mengakses aplikasi melalui domain:

https://greenstore.iwakqu.biz.id

---

# Akun Demo

| Role | Email | Password |
|------|-------|----------|
| Admin Pusat | admin@gmail.com | 123456 |
| Admin Artikel | artikel@gmail.com | 123456 |
| Admin Market | market@gmail.com | 123456 |
| Admin Gunung | penanggungan@gamil.com | 123456 |
| User | sitoh@gmail.com | 12345678 |

---

# Screenshot Aplikasi

Tambahkan screenshot berikut pada repository GitHub:

- Dashboard User
- Halaman Gunung
- Halaman Artikel
- Marketplace
- Dashboard Admin Market
- Dashboard Admin Artikel
- Dashboard Admin Gunung
- Dashboard Admin Pusat

---

# Deskripsi Singkat

GreenStore dikembangkan sebagai aplikasi berbasis web yang mengintegrasikan sistem informasi pendakian gunung dengan marketplace perlengkapan outdoor. Sistem menyediakan informasi gunung, artikel edukasi, pelaporan kondisi pendakian, serta marketplace yang mendukung proses pemesanan produk melalui WhatsApp. Selain itu, GreenStore menerapkan sistem multi-role yang terdiri atas Admin Pusat, Admin Gunung, Admin Artikel, Admin Market, dan User sehingga pengelolaan data dapat dilakukan secara terstruktur sesuai dengan hak akses masing-masing pengguna.

---

# Pengembang

**Kelompok Proyek Akhir Mata Kuliah Pemrograman Web**

Anggota:

- Siti Masito
- Joened Sastra
- Andika Dwi Santoso


---

# 📄 License

Project ini dikembangkan sebagai tugas akhir Mata Kuliah **Pemrograman Web** 
