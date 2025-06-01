
```markdown
# 📚 Digital Library Management System

Sistem Informasi Perpustakaan berbasis web menggunakan PHP dan MySQL. Aplikasi ini memfasilitasi proses peminjaman dan pengembalian buku oleh pengguna (mahasiswa), serta pengelolaan data oleh admin.

## 🔧 Fitur Utama

- 🔐 Autentikasi pengguna (Login Anggota & Admin)
- 📖 Daftar buku dan kategori
- 🧑‍🎓 Manajemen data anggota (user)
- 📥 Peminjaman buku
- 📤 Pengembalian buku
- 📊 Riwayat transaksi peminjaman
- 👮 Panel admin untuk pengelolaan database

## 🗂️ Struktur Folder

```

/admin            → Panel admin
/anggota          → Halaman anggota
/auth             → Login & Register
/includes         → Koneksi database & helper
/proses           → Proses logic (pinjam, kembali, dll)
/assets           → CSS, JS, gambar

````

## 🛢️ Database Design (ERD)

Terdapat 5 tabel utama:
- `user`: menyimpan data mahasiswa (anggota)
- `buku`: informasi buku
- `pinjam_header`: informasi peminjaman
- `pinjam_detail`: detail buku yang dipinjam
- `pengembalian`: data pengembalian buku

> Foreign key digunakan untuk menjaga integritas data antar tabel.

## 💻 Teknologi yang Digunakan

- PHP (Native)
- MySQL / MariaDB
- HTML5, CSS3, JavaScript
- XAMPP (untuk development lokal)

## ⚙️ Cara Menjalankan

1. Clone repositori ini
   ```bash
   git clone https://github.com/username/nama-repo.git
````

2. Jalankan XAMPP, aktifkan Apache & MySQL
3. Import file `database.sql` ke phpMyAdmin
4. Letakkan folder di `htdocs`
5. Akses melalui browser:

   ```
   http://localhost/nama-folder
   ```

## 👤 Hak Akses Default

| Role    | Username            | Password |
| ------- | ------------------- | -------- |
| Admin   | admin               | admin    |
| Anggota | nim dari tabel user | -        |

> Kamu bisa menyesuaikan data awal langsung dari database.

## 📌 Catatan

* Denda pengembalian belum otomatis dihitung
* Validasi form masih dasar
* Belum menggunakan framework (pure PHP)

## 📜 Lisensi

Proyek ini bebas digunakan untuk tujuan pembelajaran. Silakan beri kredit jika digunakan kembali.

---

````

Jika kamu ingin menambahkan screenshot, cukup simpan gambar ke folder proyek dan tambahkan di README:

```markdown
## 🖼️ Screenshot
![Dashboard](./assets/img/dashboard.png)
````

---
