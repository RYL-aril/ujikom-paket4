# Ujikom Paket 4 - Sistem Manajemen Peminjaman Buku

<p align="center">
  <strong>Aplikasi web untuk manajemen data buku dan transaksi peminjaman</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel" alt="Laravel 12">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/License-MIT-green?style=flat-square" alt="License">
</p>

---

## 📋 Daftar Isi

- [Tentang Proyek](#tentang-proyek)
- [Fitur Utama](#fitur-utama)
- [Prasyarat Sistem](#prasyarat-sistem)
- [Instalasi](#instalasi)
- [Konfigurasi](#konfigurasi)
- [Database](#database)
- [Menjalankan Aplikasi](#menjalankan-aplikasi)
- [Testing](#testing)
- [Struktur Proyek](#struktur-proyek)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Kontribusi](#kontribusi)

---

## 📚 Tentang Proyek

Ujikom Paket 4 adalah aplikasi web yang dibangun dengan **Laravel 12** untuk mengelola sistem peminjaman buku. Aplikasi ini dirancang untuk memudahkan perpustakaan atau toko buku dalam mencatat data buku, anggota, dan transaksi peminjaman.

---

## ✨ Fitur Utama

- 👥 **Manajemen Pengguna** - Sistem autentikasi dengan role (anggota, petugas)
- 📖 **Manajemen Buku** - CRUD lengkap untuk data buku dengan cover image
- 📝 **Transaksi Peminjaman** - Pencatatan transaksi peminjaman dan pengembalian buku
- 🔐 **Sistem Keamanan** - Middleware dan authorization untuk keamanan data
- 📱 **UI/UX Modern** - Interface responsif dengan Tailwind CSS dan Alpine.js
- 🧪 **Testing** - Unit dan feature testing dengan Pest Framework
- ⚡ **Fast Development** - Vite untuk development server yang cepat

---

## 🖥️ Prasyarat Sistem

Sebelum menjalankan proyek, pastikan sistem Anda memiliki:

- **PHP** 8.2 atau lebih tinggi
- **Composer** (package manager PHP)
- **Node.js** 18+ dan **npm** atau **yarn**
- **Database**: MySQL 5.7+ atau MariaDB
- **Git** (untuk cloning repository)
- **Laragon** (opsional, untuk local development)

---

## 📦 Instalasi

### 1. Clone Repository

```bash
git clone <repository-url>
cd ujikom-paket4
```

### 2. Install Dependencies PHP

```bash
composer install
```

### 3. Install Dependencies JavaScript

```bash
npm install
```

### 4. Buat File Environment

```bash
cp .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

---

## ⚙️ Konfigurasi

### Konfigurasi Database

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ujikom_paket4
DB_USERNAME=root
DB_PASSWORD=
```

### Konfigurasi Aplikasi Lainnya

Sesuaikan konfigurasi lainnya di file `.env` sesuai kebutuhan:

```env
APP_NAME="Ujikom Paket 4"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost
```

---

## 🗄️ Database

### Membuat Database

```bash
php artisan migrate
```

Perintah di atas akan membuat semua tabel yang diperlukan:
- `users` - Data pengguna
- `books` - Data buku
- `transaksis` - Data transaksi peminjaman

### Mengisi Data Dummy (Seeding)

Untuk mengisi database dengan data dummy untuk testing:

```bash
php artisan db:seed
```

Ini akan menjalankan seeders untuk:
- User (anggota dan petugas)
- Book (data buku)
- Transaksi (data peminjaman)

---

## 🚀 Menjalankan Aplikasi

### Development Server

Jalankan Vite development server untuk asset compilation:

```bash
npm run dev
```

Pada terminal lain, jalankan Laravel development server:

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

### Production Build

Untuk build production:

```bash
npm run build
```

---

## 🧪 Testing

### Menjalankan Semua Tests

```bash
php artisan test
```

### Menjalankan Test Spesifik

```bash
php artisan test tests/Feature/ExampleTest.php
```

### Dengan Parallel Testing

```bash
php artisan test --parallel
```

Proyek menggunakan **Pest Framework** untuk testing yang lebih expressive dan intuitif.

---

## 📁 Struktur Proyek

```
ujikom-paket4/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Business logic controllers
│   │   ├── Middleware/       # Custom middleware
│   │   └── Requests/         # Form request validation
│   ├── Models/
│   │   ├── User.php         # Model user
│   │   ├── Book.php         # Model buku
│   │   └── Transaksi.php    # Model transaksi
│   └── Providers/            # Service providers
├── database/
│   ├── migrations/           # Database migrations
│   ├── seeders/             # Database seeders
│   └── factories/           # Model factories
├── resources/
│   ├── views/               # Blade templates
│   ├── css/                 # Stylesheet
│   └── js/                  # JavaScript files
├── routes/
│   ├── web.php              # Web routes
│   ├── auth.php             # Auth routes
│   ├── anggota.php          # Member routes
│   ├── petugas.php          # Officer routes
│   └── public.php           # Public routes
├── tests/                    # Test files
├── config/                   # Configuration files
├── storage/                  # Storage files
├── public/                   # Public assets
│   └── images_covers/       # Book cover images
└── vendor/                   # Dependencies
```

---

## 🛠️ Teknologi yang Digunakan

### Backend
- **Laravel 12** - PHP web framework
- **Eloquent ORM** - Database abstraction
- **Laravel Breeze** - Authentication scaffolding
- **Pest** - Testing framework

### Frontend
- **Blade** - Template engine
- **Tailwind CSS 4** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Vite** - Build tool dan dev server

### Database
- **MySQL/MariaDB** - Relational database

### Tools
- **Composer** - PHP package manager
- **npm** - JavaScript package manager
- **Artisan** - Laravel command-line tool
- **Laragon** - Local development environment

---

## 📖 Models & Database

### User
Menyimpan data pengguna dengan role (member/petugas):
```php
- id
- name
- email
- password
- role
- timestamps
```

### Book
Menyimpan data buku:
```php
- id
- title
- author
- isbn
- publisher
- year
- cover_image
- total_copies
- available_copies
- timestamps
```

### Transaksi
Merekam transaksi peminjaman dan pengembalian:
```php
- id
- user_id
- book_id
- borrow_date
- return_date
- due_date
- status
- timestamps
```

---

## 🔗 Routes

### Public Routes
- `GET /` - Halaman home
- `GET /books` - Daftar buku

### Auth Routes
- `POST /login` - Login
- `POST /register` - Register
- `POST /logout` - Logout

### Member Routes (anggota.php)
- `GET /dashboard` - Dashboard anggota
- `GET /borrows` - Riwayat peminjaman

### Officer Routes (petugas.php)
- `GET /dashboard` - Dashboard petugas
- `GET /books` - Manajemen buku
- `POST /books` - Tambah buku
- `GET /transaksis` - Manajemen transaksi

---

## 💡 Tips Development

### Artisan Commands yang Berguna

```bash
# Membuat migration baru
php artisan make:migration create_table_name

# Membuat model dengan factory dan migration
php artisan make:model ModelName -mf

# Membuat controller
php artisan make:controller ControllerName

# List semua routes
php artisan route:list

# Optimize untuk production
php artisan optimize

# Clear cache
php artisan cache:clear
php artisan config:clear
```

---

## 🐛 Troubleshooting

### Permission Denied pada storage/logs
```bash
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
```

### Database connection error
- Pastikan MySQL running
- Cek konfigurasi `.env`
- Jalankan `php artisan migrate`

### Node modules tidak terinstall
```bash
rm -rf node_modules package-lock.json
npm install
```

---

## 📝 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

## 👤 Autor

Dibuat untuk ujikom paket 4

---

## 📞 Dukungan

Jika menemukan issue atau bug, silakan buka [issue](../../issues) di repository ini.

---

**Happy Coding! 🚀****

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
