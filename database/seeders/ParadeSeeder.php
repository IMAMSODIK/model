<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parades')->insert([
            [
                'nama' => 'Culture Parade',
                'gambar' => 'culture_parade.jpg',
                'tanggal' => '2025-01-12',
                'jam_mulai' => '09:00:00',
                'jam_selesai' => '11:00:00',
                'vanue' => 'City Park',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Night Light Parade',
                'gambar' => 'night_parade.jpg',
                'tanggal' => '2025-01-15',
                'jam_mulai' => '19:00:00',
                'jam_selesai' => '21:00:00',
                'vanue' => 'Downtown Street',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
