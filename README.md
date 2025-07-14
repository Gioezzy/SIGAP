# Project Base Learning TRPL 2C Kelompok 4 2024/2025

## SIGAP - Sistem Informasi Pengaduan

**SIGAP** adalah aplikasi web berbasis Laravel yang memungkinkan masyarakat menyampaikan pengaduan, kritik, saran, dan aspirasi kepada pihak terkait. Aplikasi ini dirancang untuk mempermudah proses pelaporan dan mempercepat penanganan aduan secara transparan. Aplikasi ini dilengkapi dengan dashboard admin menggunakan Filament.

---

## Tim Project

- [@yolizaerwanda](https://github.com/yolizaerwanda) Yoliza Erwanda (Project Manager)

- [@Gioezzy](https://github.com/gioezzy) Giovanni Yuda Prastika (Backend Developer)

- [@Lupi2602](https://github.com/Lupi2602) Luthfi Tsani Ranofan (Frontend Developer)

---
## 🚀 Teknologi dan Library yang Digunakan

- [Laravel](https://laravel.com/) – Framework utama berbasis PHP
- [Laravel Sanctum](https://laravel.com/docs/sanctum) – Autentikasi token berbasis SPA/API
- [Laravel Socialite](https://laravel.com/docs/socialite) – Login OAuth (Google, GitHub, dll)
- [Filament](https://filamentphp.com/docs) – Admin panel untuk Laravel
- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) – Starter kit autentikasi ringan
- [Vite](https://vitejs.dev/) – Build tool modern untuk frontend
- [Tailwind CSS](https://tailwindcss.com/docs) – Utility-first CSS framework
- [Alpine.js](https://alpinejs.dev/) – JavaScript ringan untuk UI interaktif
- [Axios](https://axios-http.com/) – HTTP client untuk komunikasi API
- [PHPUnit](https://phpunit.de/) – Framework testing untuk PHP

---

## ⚙️ Langkah Instalasi

Pastikan sudah menginstal:
- PHP 8.2 atau lebih baru
- Composer
- MySQL
- Node.js dan npm

### 1. Clone repositori
```bash
git clone https://github.com/Gioezzy/SIGAP.git
cd SIGAP
```

### 2. Install dependency backend
```bash
composer install
```

### 3. Install dependency frontend
```bash
npm install
```

### 4. Salin file environment
```bash
cp .env.example .env
```

### 5. Generate application key
```bash
php artisan key:generate
```

### 6. Buat database di MySQL dan sesuaikan file `.env`
```env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 7. Jalankan migrasi database
```bash
php artisan migrate
```

Jika ada seeder:
```bash
php artisan db:seed
```

### 8. Build frontend
```bash
npm run dev
```

### 9. Jalankan server lokal
```bash
php artisan serve
```

### 10. Akses aplikasi di browser
```bash
http://localhost:8000
```

---

## 🌐 Demo Aplikasi

🔗 [https://sigap.gioezzy.xyz](https://sigap.gioezzy.xyz)

---

## 🧑‍💼 Akun Login (Untuk Keperluan Uji Coba)

| Role            | Email                                           | Password     |
|-----------------|--------------------------------------------------|--------------|
| Admin      | admin@admin.sigap.com                | password123  |
| Masyarakat    | user@user.sigap.com            | password123  |

> Semua akun di atas telah diberikan role yang sesuai untuk melakukan pengujian pada sistem.

---



Proyek ini dibuat untuk keperluan **Project-Based Learning (PBL)** dan untuk memenuhi kerjasama dengan mitra terkait. Dan juga sebagai nilai tugas akhir dari prodi D4 Teknologi Rekayasa Perangkat Lunak Politeknik Negeri Padang

Silakan digunakan, dimodifikasi, atau dikembangkan lebih lanjut sesuai kebutuhan pembelajaran.