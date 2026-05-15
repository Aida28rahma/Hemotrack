<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Petugas (Admin/Staff)
        User::updateOrCreate(
            ['email' => 'petugas@hemotrack.com'],
            [
                'name' => 'Petugas PMI',
                'email' => 'petugas@hemotrack.com',
                'role' => User::ROLE_PETUGAS,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@hemotrack.com'],
            [
                'name' => 'Admin Hemotrack',
                'email' => 'admin@hemotrack.com',
                'role' => User::ROLE_PETUGAS,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Dokter
        User::updateOrCreate(
            ['email' => 'dr.bayu@hemotrack.com'],
            [
                'name' => 'dr. Bayu Bimasena',
                'email' => 'dr.bayu@hemotrack.com',
                'role' => User::ROLE_DOKTER,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'dr.budi@hemotrack.com'],
            [
                'name' => 'dr. Budi Utomo',
                'email' => 'dr.budi@hemotrack.com',
                'role' => User::ROLE_DOKTER,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'dr.fajri@hemotrack.com'],
            [
                'name' => 'dr. Fajri Alfahri',
                'email' => 'dr.fajri@hemotrack.com',
                'role' => User::ROLE_DOKTER,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
    }
}
