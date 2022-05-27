<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\M_ruang_klinik;

class RuangKlinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ruang = [
            'Ruang Pendaftaran',
            'Ruang Administrasi',
            'Ruang Tindakan',
            'Ruang Perawatan',
            'Ruang Farmasi',
            'Ruang Konsultasi Dokter',
            'Ruang Papan Nama Klinik',
            'Ruang Papan Nama Dokter',
            'Ruang Kamar Mandi'
        ];
       
        foreach ($ruang as $r) {
            M_ruang_klinik::create(
                ['ruang' => $r]
            );
        }
    }
}
