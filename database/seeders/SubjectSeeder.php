<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        DB::table('subjects')->insert([
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'I', 'code' => 'KU31101', 'name' => 'Bahasa Inggris I', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'I', 'code' => 'TI31101', 'name' => 'Inovasi Digital', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'I', 'code' => 'KU31102', 'name' => 'Pembentukan Karakter Del', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'I', 'code' => '1031101', 'name' => 'Dasar Pemgrograman', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'I', 'code' => '1031102', 'name' => 'Matematika Diskrit', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'I', 'code' => '1031103', 'name' => 'Arsitektur dan Organisasi Komputer', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'I', 'code' => '1131105', 'name' => 'Rekayasa Perangkat Lunak', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'I', 'code' => '1131104', 'name' => 'Pengembangan Situs Web I', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'II', 'code' => 'KU31201', 'name' => 'Bahasa Inggris II', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'II', 'code' => '1031201', 'name' => 'Algoritma dan Struktur Data', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'II', 'code' => '1031202', 'name' => 'Sistem Operasi', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'II', 'code' => '1131203', 'name' => 'Perancangan Perangkat Lunak', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'II', 'code' => '1131204', 'name' => 'Pengembangan Situs Web II', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'II', 'code' => '1131205', 'name' => 'Pengenalan Basis Data', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'II', 'code' => '1131290', 'name' => 'Proyek Akhir Tahun I', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'III', 'code' => 'KU32101', 'name' => 'Bahasa Inggris III', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'III', 'code' => 'MA32101', 'name' => 'Probabilitas dan Statistika', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'III', 'code' => '1032101', 'name' => 'Jaringan Komputer', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'III', 'code' => '1132102', 'name' => 'Perograman Berorientasi Objek', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'III', 'code' => '1132103', 'name' => 'Pengembangan Aplikasi Mobile', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'III', 'code' => '1132104', 'name' => 'Peracangan Antarmuka Pengguna', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'III', 'code' => '1132205', 'name' => 'Sistem Basis Data', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'IV', 'code' => 'KU32201', 'name' => 'Bahasa Inggris IV', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'IV', 'code' => 'KU32202', 'name' => 'Penulisan Karya Ilmiah', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'IV', 'code' => '1032201', 'name' => 'Aljabar Linier', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'IV', 'code' => '1132202', 'name' => 'Pemrograman Teknologi .NET', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'IV', 'code' => '1132203', 'name' => 'Pengembangan Aplikasi Terdistribusi', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'IV', 'code' => '1132204', 'name' => 'Pengujian dan Kualitas Perangkat Lunak', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'IV', 'code' => '1132290', 'name' => 'Proyek Akhir Tahun II', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'IV', 'code' => 'KUS3051', 'name' => 'Studi/Proyek Independen I', 'sks' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'IV', 'code' => 'KUS3061', 'name' => 'Magang I', 'sks' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'V', 'code' => 'KU33101', 'name' => 'Bahasa Inggris V', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'V', 'code' => '1033101', 'name' => 'Teknologi Kecerdasan Buatan', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'V', 'code' => '1133102', 'name' => 'Algoritma Lanjut', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'V', 'code' => '1133103', 'name' => 'Java untuk Pemrograman Aplikasi Enterprise', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'V', 'code' => '1133104', 'name' => 'Keamanan Perangkat Lunak', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'V', 'code' => '1133190', 'name' => 'Tugas Akhir I', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'V', 'code' => 'TI33101', 'name' => 'Keteknowiraan', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'VI', 'code' => 'KU33201', 'name' => 'Bahasa Inggris VI', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'VI', 'code' => 'KU33202', 'name' => 'Agama dan Etika', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'VI', 'code' => 'KU33203', 'name' => 'Pancasila dan Kewarganegaraan', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'VI', 'code' => '1133201', 'name' => 'Administrasi Basis Data', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'VI', 'code' => '1133202', 'name' => 'Social and Professional IT Ethics', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'VI', 'code' => '1133290', 'name' => 'Tugas Akhir II', 'sks' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'VI', 'code' => '1133291', 'name' => 'Kerja Praktik', 'sks' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'VI', 'code' => 'KUS3052', 'name' => 'Studi/Proyek Independen II', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Informasi', 'semester' => 'VI', 'code' => 'KUS3062', 'name' => 'Magang II', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],

            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'I', 'code' => 'KU31101', 'name' => 'Bahasa Inggris I', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'I', 'code' => 'TI31101', 'name' => 'Inovasi Digital', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'I', 'code' => 'KU31102', 'name' => 'Pembentukan Karakter Del', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'I', 'code' => '1031101', 'name' => 'Dasar Pemrograman', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'I', 'code' => '1031102', 'name' => 'Matematika Diskrit', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'I', 'code' => '1031103', 'name' => 'Arsitektur dan Organisasi Komputer', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'I', 'code' => '1331104', 'name' => 'Pengembangan Situs Web I', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'I', 'code' => '1331105', 'name' => 'Pengenalan Rekayasa Perangkat Lunak', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'II', 'code' => 'KU31201', 'name' => 'Bahasa Inggris II', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'II', 'code' => '1031201', 'name' => 'Algoritma dan Struktur Data', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'II', 'code' => '1031202', 'name' => 'Sistem Operasi', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'II', 'code' => '1031203', 'name' => 'Aljabar Linier', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'II', 'code' => '1331204', 'name' => 'Pengembangan Aplikasi Berbasis Internet', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'II', 'code' => '1331205', 'name' => 'Proyek Akhir Tahun I', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'II', 'code' => '1331206', 'name' => 'Pengenalan Basis Data', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'III', 'code' => 'KU32101', 'name' => 'Bahasa Inggris II', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'III', 'code' => 'MA32101', 'name' => 'Probabilitas dan Statistika', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'III', 'code' => '1032101', 'name' => 'Jaringan Komputer', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'III', 'code' => '1332102', 'name' => 'Pemrograman Sistem', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'III', 'code' => '1332103', 'name' => 'Perancangan Antarmuka Pengguna', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'III', 'code' => '1332104', 'name' => 'Virtualisasi Komputer', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'III', 'code' => '1332105', 'name' => 'Dasar Elektronika', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'IV', 'code' => 'KU32201', 'name' => 'Bahasa Inggris IV', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'IV', 'code' => 'KU32202', 'name' => 'Penulisan Karya Ilmiah', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'IV', 'code' => '1332201', 'name' => 'Antar Jaringan', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'IV', 'code' => '1332202', 'name' => 'Perangkat Lunak Sistem Jaringan', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'IV', 'code' => '1332203', 'name' => 'Proyek Akhir Tahun II', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'IV', 'code' => '1332204', 'name' => 'Sistem Terdistibusi', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'IV', 'code' => '1332205', 'name' => 'Sistem Tertanam', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'V', 'code' => 'KU33101', 'name' => 'Bahasa Inggris V', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'V', 'code' => 'TI33101', 'name' => 'Keteknowiraan', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'V', 'code' => '1133101', 'name' => 'Administrasi Jaringan', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'V', 'code' => '1133102', 'name' => 'Keamanan Jaringan', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'V', 'code' => '1133103', 'name' => 'Penerapan Infrastruktur Cloud', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'V', 'code' => '1133104', 'name' => 'Teknologi loT', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'V', 'code' => '1133105', 'name' => 'Tugas Akhir I', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'VI', 'code' => 'KU33201', 'name' => 'Bahasa Inggris VI', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'VI', 'code' => 'KU33202', 'name' => 'Agama dan Etika', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'VI', 'code' => 'KU33203', 'name' => 'Pancasila Kewarganegaraan', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'VI', 'code' => '1333290', 'name' => 'Kerja Praktik', 'sks' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'VI', 'code' => '1333201', 'name' => 'Tugas Akhir II', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'VI', 'code' => '1333202', 'name' => 'Etika Profesi', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'VI', 'code' => '1333203', 'name' => 'Komunikasi Data', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'VI', 'code' => '1333204', 'name' => 'Pengembangan Profesi', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'D-III Teknologi Komputer', 'semester' => 'VI', 'code' => 'KUS3045', 'name' => 'Studi/Proyek Independen 4', 'sks' => 4, 'created_at' => now(), 'updated_at' => now()],

            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'I', 'code' => 'KU41101', 'name' => 'Pembentukan Karakter Del', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'I', 'code' => 'KU41102', 'name' => 'Bahasa Inggris I', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'I', 'code' => 'TI41101', 'name' => 'Inovasi Digital', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'I', 'code' => '1041101', 'name' => 'Dasar Pemrograman', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'I', 'code' => '1041102', 'name' => 'Matematika Diskrit', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'I', 'code' => '1041103', 'name' => 'Arsitektur dan Organisasi Komputer', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'I', 'code' => '1041104', 'name' => 'Pengembangan Situs Web I', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'I', 'code' => '1041105', 'name' => 'Pengenalan Rekayasa Perangkat Lunak', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'II', 'code' => 'KU41201', 'name' => 'Bahasa Inggris II', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'II', 'code' => 'KU41202', 'name' => 'Penulisan Karya Ilmiah', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'II', 'code' => '1041202', 'name' => 'Sistem Opreasi', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'II', 'code' => '1141203', 'name' => 'Analisis Kebutuhan Perangkat Lunak', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'II', 'code' => '1141204', 'name' => 'Pengembangan Situs Web II', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'II', 'code' => '1141205', 'name' => 'Pengenalan Basis Data', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'II', 'code' => '1141290', 'name' => 'Proyek Akhir Tahun I', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'III', 'code' => 'KU42101', 'name' => 'Bahasa Inggris III', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'III', 'code' => '1042101', 'name' => 'Jaringan Komputer', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'III', 'code' => '1042102', 'name' => 'Algoritma dan Struktur Data', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'III', 'code' => '1142103', 'name' => 'Pengembangan Perangkat Lunak Berorientasi Objek', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'III', 'code' => '1142104', 'name' => 'Perancangan Antarmuka Pengguna', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'III', 'code' => '1142105', 'name' => 'Sistem Basis Data', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'III', 'code' => '1142106', 'name' => 'Logika Informatika', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'IV', 'code' => 'KU42201', 'name' => 'Bahasa Inggris IV', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'IV', 'code' => 'MA42201', 'name' => 'Probabilitas dan Statistik', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'IV', 'code' => '1042201', 'name' => 'Pemrograman Berorientasi Objek', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'IV', 'code' => '1142202', 'name' => 'Pengembangan Aplikasi Terdistribusi', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'IV', 'code' => '1142203', 'name' => 'Pengembangan Aplikasi Mobile', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'IV', 'code' => '1142290', 'name' => 'Proyek Akhir Tahun II', 'sks' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'V', 'code' => 'KU43101', 'name' => 'Bahasa Inggris V', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'V', 'code' => '1143101', 'name' => 'Pengujian Perangkat Lunak', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'V', 'code' => '1143102', 'name' => 'Algoritma Lanjut', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'V', 'code' => '1143103', 'name' => 'Kreativitas dan Inovasi', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'V', 'code' => '1143104', 'name' => 'Keamanan Perangkat Lunak', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'V', 'code' => '1143105', 'name' => 'Automata', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'V', 'code' => '1143106', 'name' => 'Metodologi Penelitian', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'V', 'code' => '1143203', 'name' => 'Pembelajaran Mesin', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VI', 'code' => 'KU43201', 'name' => 'Bahasa Inggris VI', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VI', 'code' => 'KU43202', 'name' => 'Agama dan Etika', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VI', 'code' => 'KU43203', 'name' => 'Pancasila dan Kewarganegaraan', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VI', 'code' => '1143201', 'name' => 'Etika Profesi', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VI', 'code' => '1143202', 'name' => 'Design Thinking', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VI', 'code' => '1143204', 'name' => 'Komputer dan Masyarakat', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VI', 'code' => '1143290', 'name' => 'Proyek Akhir Tahun III', 'sks' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VI', 'code' => 'KUS3052', 'name' => 'Studi/Proyek Independen 2', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VI', 'code' => 'KUS3054', 'name' => 'Studi/Proyek Independen 4', 'sks' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VI', 'code' => 'KUS3056', 'name' => 'Studi/Proyek Independen 6', 'sks' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VII', 'code' => 'TI44101', 'name' => 'Keteknowiraan', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VII', 'code' => '1144101', 'name' => 'Arsitektur dan Perancangan Perangkat Lunak', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VII', 'code' => '1144102', 'name' => 'Manajemen Proyek', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VII', 'code' => '1144103', 'name' => 'Kualitas Perangkat Lunak', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VII', 'code' => '1144104', 'name' => 'Reenginering Perangkat Lunak', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VII', 'code' => '1144190', 'name' => 'Tugas Akhir I', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VII', 'code' => '1144105', 'name' => 'Kecerdasan Buatan', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VII', 'code' => 'KUS3063', 'name' => 'Magang 3', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VII', 'code' => 'KUS3053', 'name' => 'Studi/Proyek Independen 3', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VII', 'code' => 'TIS3001', 'name' => 'Keteknowiraan', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VIII', 'code' => '1144201', 'name' => 'Studi Mandiri / Sertifikasi Profesional', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VIII', 'code' => '1144290', 'name' => 'Tugas Akhir II', 'sks' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VIII', 'code' => '1144291', 'name' => 'Kerja Praktik Industri', 'sks' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['prodi' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'semester' => 'VIII', 'code' => '1144106', 'name' => 'UI/UX Design', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
