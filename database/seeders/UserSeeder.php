<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_categories')->insert([
            ['name' => 'D-III Teknologi Komputer', 'role' => '3', 'slug' => 'd-iii-teknologi-komputer', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'D-III Teknologi Informasi', 'role' => '3', 'slug' => 'd-iii-teknologi-informasi', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'role' => '3', 'slug' => 'sarjana-terapan-teknologi-rekayasa-rerangkat-lunak', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'D-III Teknologi Komputer', 'role' => '4', 'slug' => 'd-iii-teknologi-komputer', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'D-III Teknologi Informasi', 'role' => '4', 'slug' => 'd-iii-teknologi-informasi', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sarjana Terapan Teknologi Rekayasa Perangkat Lunak', 'role' => '4', 'slug' => 'sarjana-terapan-teknologi-rekayasa-rerangkat-lunak', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Asisten Dosen Fakultas Vokasi', 'role' => '5', 'slug' => 'asisten-dosen-fakultas-vokasi', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'BAAK Fakultas Vokasi', 'role' => '5', 'slug' => 'baak-fakultas-vokasi', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Himatek', 'role' => '6', 'slug' => 'himatek', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Himatif', 'role' => '6', 'slug' => 'himatif', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Himatera', 'role' => '6', 'slug' => 'himatera', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
        DB::table('users')->insert([
            ['user_category_id' => null, 'name' => 'Administrator', 'email' => 'demo@admin.com', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'role' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['user_category_id' => null, 'name' => 'Dekan', 'email' => 'demo@dekan.com', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'role' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['user_category_id' => null, 'name' => 'KA Prodi', 'email' => 'demo@kaprodi.com', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'role' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['user_category_id' => 4, 'name' => 'Dosen', 'email' => 'demo@dosen.com', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'role' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['user_category_id' => 7, 'name' => 'Staf', 'email' => 'demo@staf.com', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'role' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['user_category_id' => 9, 'name' => 'Himatek', 'email' => 'demo@himatek.com', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'role' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['user_category_id' => 10, 'name' => 'Himatif', 'email' => 'demo@himatif.com', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'role' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['user_category_id' => 11, 'name' => 'Himatera', 'email' => 'demo@himatera.com', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'role' => '6', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
