Berikut adalah cara menjalankan aplikasi ini:

# Cara Menjalankan Webapp CI4 ini

## Persyaratan

1. PHP versi 8.1 atau lebih tinggi.
2. Composer (https://getcomposer.org/).
3. MySQL atau MariaDB untuk database.

## Langkah-langkah

1. Ekstrak Zip

2. Instal dependensi menggunakan Composer:

   ```sh
   composer install
   ```

3. Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi yang diperlukan:

   ```sh
   cp .env.example .env
   ```

4. Sesuaikan konfigurasi database di file `.env`:

   ```plaintext
   database.default.hostname = localhost
   database.default.database = nama_database
   database.default.username = nama_pengguna
   database.default.password = kata_sandi
   database.default.DBDriver = MySQLi
   ```

5. Import database dari `phpMyAdmin`:

    - Buka `phpMyAdmin`.
    - Buat database baru dengan nama yang sesuai dengan konfigurasi di `.env`.
    - Import file `ci4app.sql` yang terdapat di dalam folder ci4app->database.

6. Jalankan server pengembangan menggunakan perintah berikut:

   ```sh
   php spark serve
   ```

7. Buka browser dan akses aplikasi di `http://localhost:8080`.

8. Login menggunakan email dan password berikut:

    - Admin:
        - Email: admin@example.com
        - Password: admin123

        - Email: miftahulkhairi24@gmail.com
        - Password: khairi97

    - User:
        - Email: anikhairani@gmail.com
        - Password: 12345678

        - Email: siti@example.com
        - Password:

        - Email: judinman@gmail.com
        - Password:

## Fitur Aplikasi

1. **Halaman Login**:
    - Masukkan email dan password, lalu klik tombol login.
    - Proses login menggunakan AJAX.

2. **Halaman Profil**:
    - Jika login sebagai admin, akan diarahkan ke halaman profil admin.
    - Jika login sebagai user, akan diarahkan ke halaman profil user.

3. **Tambah User Baru (Admin)**:
    - Admin dapat menambahkan user baru melalui form yang tersedia.
    - Form terdiri dari:
        - Photo (wajib diisi)
        - Nama lengkap (wajib diisi)
        - Gelar depan (wajib diisi)
        - Gelar belakang (wajib diisi)
        - NIP (hanya angka, 18 karakter, boleh kosong)
        - NIK (hanya angka, 16 karakter, wajib diisi)
        - Jenis kelamin (radio button, wajib diisi)
        - Alamat (boleh kosong)
        - Email (wajib diisi)
        - Password (wajib diisi)
        - Level (select: admin atau user)
    - Proses penyimpanan data user baru menggunakan AJAX dengan validasi.

4. **Tombol Logout**:
    - Terdapat tombol logout untuk keluar dari aplikasi.

## Proteksi Akses

- Menggunakan middleware (Filters pada CI4) untuk memproteksi akses admin dan user.
- Proteksi CSRF diaktifkan untuk mencegah serangan CSRF.
