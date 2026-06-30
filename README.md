# 🌿 GreenStore

GreenStore adalah aplikasi berbasis web yang dikembangkan menggunakan **Laravel 12** sebagai platform informasi dan marketplace perlengkapan pendakian gunung. Aplikasi ini menyediakan informasi gunung, artikel edukasi, sistem pelaporan pendakian, serta marketplace yang memungkinkan pengguna membeli perlengkapan outdoor melalui WhatsApp.

---

## 📌 Teknologi yang Digunakan

- Laravel 12
- PHP 8.2+
- MySQL
- Bootstrap 5
- HTML, CSS, JavaScript
- Railway (Deployment)
- GitHub

---

# ✨ Fitur Aplikasi

## 👤 User

- Login & Register
- Melihat daftar gunung
- Detail gunung
- Membuat laporan pendakian
- Riwayat laporan
- Membaca artikel
- Melihat marketplace
- Detail produk
- Keranjang belanja
- Checkout melalui WhatsApp
- Pencarian produk
- Filter kategori

---

## 🏔 Admin Gunung

- Login Admin Gunung
- Melihat laporan pendakian
- Mengubah status laporan

---

## 📰 Admin Artikel

- Login Admin Artikel
- Menambah artikel
- Mengedit artikel
- Menghapus artikel
- Dashboard artikel

---

## 🛒 Admin Market

- Login Admin Market
- Dashboard market
- Menambah produk
- Mengedit produk
- Menghapus produk
- Upload gambar produk
- Tambah stok cepat
- Melihat total produk
- Melihat total stok

---

## 👑 Admin Pusat

- Dashboard Admin
- Kelola data gunung
- Tambah gunung
- Edit gunung
- Rekap laporan
- Statistik laporan

---

# 📂 Struktur Project

```
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

# ⚙️ Cara Menjalankan di Lokal

## 1. Clone Repository

```bash
git clone https://github.com/USERNAME/GreenStore.git
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

```bash
cp .env.example .env
```

atau Windows

```bash
copy .env.example .env
```

## 5. Generate Application Key

```bash
php artisan key:generate
```

## 6. Konfigurasi Database

Buat database baru, kemudian sesuaikan file `.env`.

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

## 8. Jalankan Seeder (jika tersedia)

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

# 🚀 Ringkasan Deployment

Aplikasi dideploy menggunakan **Railway**.

Tahapan deployment:

1. Push project ke GitHub.
2. Hubungkan repository ke Railway.
3. Tambahkan layanan MySQL Railway.
4. Konfigurasi Environment Variables.
5. Jalankan migration.
6. Generate APP_KEY.
7. Deploy aplikasi.
8. Akses melalui URL Railway.

---

# 👥 Akun Demo

## Admin Pusat

Email :

```
admin@greenstore.com
```

Password :

```
********
```

---

## Admin Market

Email :

```
market@greenstore.com
```

Password :

```
********
```

---

## Admin Artikel

Email :

```
artikel@greenstore.com
```

Password :

```
********
```

---

## Admin Gunung

Email :

```
gunung@greenstore.com
```

Password :

```
********
```

---

## User

Silakan melakukan registrasi atau menggunakan akun demo yang disediakan.

---

# 📖 Deskripsi Singkat

GreenStore dikembangkan sebagai aplikasi informasi pendakian gunung yang dipadukan dengan marketplace perlengkapan outdoor. Sistem memiliki beberapa level administrator untuk mengelola data gunung, artikel, laporan pendakian, dan produk marketplace sehingga memudahkan pengelolaan informasi maupun transaksi pengguna.

---

# 👨‍💻 Pengembang

Proyek GreenStore

Universitas KH. A. Wahab Hasbullah
