# Laporan Project GreenStore

## 1. Pendahuluan

GreenStore adalah aplikasi web berbasis Laravel yang dibuat untuk membantu pengguna mendapatkan informasi pendakian gunung, membuat laporan kondisi gunung, membaca artikel edukasi, dan membeli perlengkapan outdoor melalui fitur market. Sistem ini juga menyediakan beberapa jenis admin agar pengelolaan data dapat dilakukan sesuai tanggung jawab masing-masing.

Project ini dikembangkan dengan konsep sederhana, mudah digunakan, dan terhubung langsung dengan kebutuhan pengguna. User dapat melihat daftar gunung, membuat laporan, melihat riwayat laporan, membaca artikel, serta melakukan pemesanan produk melalui WhatsApp. Admin dapat mengelola data sesuai perannya.

## 2. Tujuan Project

Tujuan utama GreenStore adalah:

1. Memudahkan user dalam melihat informasi gunung.
2. Memudahkan user mengirim laporan terkait kondisi gunung.
3. Membantu admin gunung memantau dan memperbarui status laporan.
4. Menyediakan artikel edukasi seputar pendakian dan perlengkapan outdoor.
5. Menyediakan fitur market untuk produk perlengkapan pendakian.
6. Menghubungkan proses checkout market ke WhatsApp.

## 3. Teknologi Yang Digunakan

Project ini menggunakan teknologi berikut:

1. Laravel sebagai framework backend.
2. Blade sebagai template engine tampilan.
3. Bootstrap untuk komponen dan layout antarmuka.
4. MySQL sebagai database.
5. PHP sebagai bahasa pemrograman utama.
6. XAMPP sebagai lingkungan server lokal.
7. Font Awesome untuk ikon pada tampilan.

## 4. Role Pengguna

Sistem memiliki beberapa role pengguna:

1. User
   User dapat melihat dashboard, melihat detail gunung, membuat laporan, melihat riwayat laporan, membaca artikel, melihat produk, menambahkan produk ke keranjang, dan checkout melalui WhatsApp.

2. Admin Pusat
   Admin pusat dapat melihat rekap laporan, mengelola data gunung, menambahkan admin gunung, mengedit data gunung beserta akun admin gunung, mengelola artikel, dan mengelola produk jika dibutuhkan.

3. Admin Gunung
   Admin gunung bertanggung jawab terhadap satu gunung tertentu. Admin gunung dapat melihat laporan yang masuk untuk gunungnya dan mengubah status laporan menjadi Pending, Terima, atau Selesai.

4. Admin Artikel
   Admin artikel dapat mengelola artikel edukasi, termasuk menambah, mengedit, dan menghapus artikel.

5. Admin Market
   Admin market dapat mengelola produk, stok produk, harga, gambar produk, dan deskripsi produk.

## 5. Fitur Utama Sistem

### 5.1 Dashboard User

Dashboard user menampilkan informasi utama seperti:

1. Daftar gunung.
2. Produk market terbaru.
3. Artikel edukasi populer.
4. Navigasi ke profil, market, artikel, dan laporan.

Tampilan dashboard dibuat dengan warna biru soft seperti langit agar lebih nyaman dilihat.

### 5.2 Data Gunung

Data gunung berisi:

1. Nama gunung.
2. Deskripsi gunung.
3. Gambar gunung.
4. Admin gunung yang bertanggung jawab.

Admin pusat dapat menambah dan mengedit gunung. Saat menambah gunung, admin pusat juga dapat membuat akun admin gunung dengan nama, email, nomor WhatsApp, dan password.

### 5.3 Laporan Gunung

User dapat membuat laporan untuk gunung tertentu. Data laporan terdiri dari:

1. User pembuat laporan.
2. Gunung tujuan laporan.
3. Jenis laporan.
4. Deskripsi laporan.
5. Gambar laporan jika ada.
6. Status laporan.

Status awal laporan adalah Pending. Admin gunung dapat memperbarui status laporan menjadi:

1. Pending
2. Terima
3. Selesai

Status laporan yang diubah admin gunung akan langsung terlihat pada riwayat laporan user.

### 5.4 Artikel Edukasi

Artikel edukasi digunakan untuk memberikan informasi kepada user. Data artikel terdiri dari:

1. Judul artikel.
2. Kategori artikel.
3. Link artikel.
4. Gambar artikel.
5. Jumlah views.

Artikel populer ditampilkan pada dashboard user berdasarkan jumlah views tertinggi.

### 5.5 Market Produk

Fitur market digunakan untuk menampilkan produk perlengkapan outdoor. Data produk terdiri dari:

1. Nama produk.
2. Kategori.
3. Harga.
4. Deskripsi.
5. Gambar.
6. Stok.

User dapat menambahkan produk ke keranjang. Saat user melakukan checkout WhatsApp, sistem akan mengecek stok terlebih dahulu. Jika stok tersedia, stok produk otomatis berkurang sesuai jumlah pesanan, keranjang dikosongkan, lalu user diarahkan ke WhatsApp.

## 6. Alur Sistem

### 6.1 Alur User Membuat Laporan

1. User login ke sistem.
2. User membuka dashboard.
3. User memilih gunung.
4. User membuat laporan.
5. Sistem menyimpan laporan dengan status Pending.
6. Admin gunung melihat laporan tersebut.
7. Admin gunung mengubah status menjadi Terima atau Selesai.
8. User melihat status terbaru pada riwayat laporan.

### 6.2 Alur Admin Gunung Mengelola Laporan

1. Admin gunung login.
2. Admin membuka halaman laporan gunung.
3. Sistem hanya menampilkan laporan dari gunung yang dikelola admin tersebut.
4. Admin memilih aksi status: Pending, Terima, atau Selesai.
5. Sistem menyimpan perubahan status.
6. Status terbaru tersinkron ke riwayat user.

### 6.3 Alur Checkout Market

1. User membuka halaman produk.
2. User menambahkan produk ke keranjang.
3. User membuka keranjang.
4. User menekan tombol Checkout WhatsApp.
5. Sistem mengecek stok produk.
6. Jika stok cukup, sistem mengurangi stok.
7. Sistem menghapus isi keranjang.
8. User diarahkan ke WhatsApp dengan pesan pesanan otomatis.

## 7. Struktur Database Utama

### 7.1 Tabel users

Tabel users digunakan untuk menyimpan data akun. Kolom penting:

1. name
2. email
3. password
4. role
5. nomor_wa
6. mountain_id

### 7.2 Tabel mountains

Tabel mountains digunakan untuk menyimpan data gunung. Kolom penting:

1. name
2. description
3. image
4. admin_id

### 7.3 Tabel laporans

Tabel laporans digunakan untuk menyimpan laporan user. Kolom penting:

1. user_id
2. mountain_id
3. jenis_laporan
4. deskripsi
5. gambar
6. status

### 7.4 Tabel articles

Tabel articles digunakan untuk menyimpan artikel edukasi. Kolom penting:

1. title
2. category
3. link
4. image
5. views

### 7.5 Tabel products

Tabel products digunakan untuk menyimpan produk market. Kolom penting:

1. nama_produk
2. kategori
3. harga
4. deskripsi
5. gambar
6. stok

## 8. Keamanan Dan Validasi

Beberapa validasi dan pengamanan yang diterapkan:

1. Login menggunakan email dan password.
2. Role digunakan untuk membatasi akses halaman admin.
3. Admin gunung hanya dapat mengubah status laporan milik gunungnya sendiri.
4. Upload gambar divalidasi berdasarkan tipe file.
5. Checkout market mengecek stok sebelum mengurangi stok produk.
6. Email admin divalidasi agar tidak duplikat.
7. Password admin dienkripsi menggunakan hash.

## 9. Pengujian

Pengujian yang dilakukan:

1. Mengecek route laporan admin.
2. Mengecek perubahan status laporan dari admin gunung.
3. Mengecek status laporan pada riwayat user.
4. Mengecek checkout WhatsApp dan pengurangan stok.
5. Mengecek syntax controller menggunakan perintah php -l.
6. Mengecek route cart dan route update status.

Hasil pengujian menunjukkan fitur utama berjalan sesuai kebutuhan.

## 10. Kesimpulan

GreenStore adalah aplikasi web yang menggabungkan informasi gunung, laporan user, artikel edukasi, dan market produk outdoor. Sistem ini membantu user dalam mendapatkan informasi dan membuat laporan, serta membantu admin dalam mengelola data sesuai perannya.

Fitur status laporan telah disinkronkan agar admin gunung dapat mengubah status laporan menjadi Pending, Terima, atau Selesai. Status tersebut akan tampil sesuai pada riwayat user. Fitur market juga telah mendukung checkout WhatsApp dengan pengurangan stok otomatis.

Dengan fitur-fitur tersebut, GreenStore dapat digunakan sebagai sistem informasi pendakian dan marketplace sederhana yang saling terintegrasi.
