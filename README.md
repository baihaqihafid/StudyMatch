# 🎓 StudyMatch

> Sistem Pendukung Keputusan Pemilihan Jurusan Kuliah untuk Siswa SMA/SMK Berbasis Web Menggunakan Metode TOPSIS

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3-06B6D4?style=for-the-badge&logo=tailwind-css&logoColor=white)

---

## 📌 Tentang Proyek

**StudyMatch** adalah aplikasi web yang membantu siswa SMA/SMK dalam memilih jurusan kuliah yang paling sesuai dengan minat, kemampuan, dan kondisi mereka. Sistem ini menggunakan metode **TOPSIS (Technique for Order of Preference by Similarity to Ideal Solution)** untuk menghasilkan rekomendasi jurusan yang objektif dan terukur.

Proyek ini dibuat sebagai **Tugas Akhir / Skripsi** sekaligus **portofolio pengembangan web** dengan stack Laravel + MySQL.

---

## ✨ Fitur Utama

### 👤 Siswa
- Register & Login dengan autentikasi aman
- Isi form penilaian berbasis 6 kriteria (minat, budget, prospek kerja)
- Lihat **Top 5 rekomendasi jurusan** beserta tingkat kecocokan (%)
- Riwayat penilaian tersimpan dan bisa dilihat kembali
- Tampilan responsif — bisa diakses dari HP maupun desktop

### 🛠️ Admin
- Dashboard statistik (total jurusan, siswa, penilaian)
- Kelola data jurusan (CRUD) beserta nilai per kriteria
- Kelola kriteria TOPSIS dan bobotnya
- Pantau data siswa yang terdaftar

---

## 🧠 Metode TOPSIS

StudyMatch menggunakan metode **TOPSIS** untuk menghitung tingkat kecocokan antara profil siswa dan setiap jurusan berdasarkan 6 kriteria:

| No | Kriteria | Bobot | Tipe |
|----|----------|-------|------|
| C1 | Minat Teknologi & Sains Eksakta | 20% | Benefit |
| C2 | Minat Kesehatan & Biologi | 15% | Benefit |
| C3 | Minat Sosial & Komunikasi | 15% | Benefit |
| C4 | Minat Bisnis & Keuangan | 15% | Benefit |
| C5 | Budget Kuliah per Tahun | 20% | Cost |
| C6 | Prioritas Prospek Kerja & Gaji | 15% | Benefit |

---

## 🛠️ Tech Stack

| Komponen | Teknologi |
|----------|-----------|
| Backend Framework | Laravel 12 |
| Language | PHP 8.3 |
| Database | MySQL |
| Frontend | Blade + Tailwind CSS |
| Authentication | Laravel Breeze |
| Role Management | Spatie Laravel Permission |
| Local Server | XAMPP |

---

## 🚀 Cara Instalasi

### Requirements
- PHP >= 8.3
- Composer
- Node.js & NPM
- MySQL (XAMPP / Laragon)

### Langkah Instalasi

**1. Clone repository**
```bash
git clone https://github.com/username/studymatch.git
cd studymatch
```

**2. Install dependencies**
```bash
composer install
npm install
```

**3. Copy file environment**
```bash
cp .env.example .env
```

**4. Setup .env**
```env
APP_NAME=StudyMatch
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=studymatch
DB_USERNAME=root
DB_PASSWORD=
```

**5. Generate app key**
```bash
php artisan key:generate
```

**6. Buat database**

Buka phpMyAdmin → buat database baru bernama `studymatch`

**7. Jalankan migrasi & seeder**
```bash
php artisan migrate --seed
```

**8. Build assets**
```bash
npm run build
```

**9. Jalankan server**
```bash
php artisan serve
```

Buka browser → `http://127.0.0.1:8000`

---

## 🔑 Akun Default

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@studymatch.com | password |
| Siswa | Register sendiri di `/register` | - |

---

## 📁 Struktur Proyek

```
studymatch/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Controller untuk panel admin
│   │   └── Siswa/          # Controller untuk portal siswa
│   ├── Models/             # Eloquent models
│   └── Services/
│       └── TopsisService.php   # Algoritma TOPSIS
├── database/
│   ├── migrations/         # Skema database
│   └── seeders/            # Data awal (jurusan, kriteria, admin)
└── resources/views/
    ├── admin/              # Tampilan panel admin
    ├── siswa/              # Tampilan portal siswa
    └── layouts/            # Layout utama (admin & siswa)
```

---

## 📸 Screenshots

> *Tambahkan screenshot aplikasi di sini*

| Halaman Login | Dashboard Siswa |
|---|---|
| ![Login](#) | ![Dashboard](#) |

| Form Penilaian | Hasil Rekomendasi |
|---|---|
| ![Form](#) | ![Hasil](#) |

---

## 📄 Lisensi

Proyek ini dibuat untuk keperluan akademik (Skripsi / Tugas Akhir).  
Bebas digunakan sebagai referensi dengan mencantumkan sumber.

---

## 👨‍💻 Developer

**Nama Kamu** — Mahasiswa Teknik Informatika  
Universitas Muhammadiyah Sidoarjo (UMSIDA)

[![GitHub](https://img.shields.io/badge/GitHub-username-181717?style=flat&logo=github)](https://github.com/username)
