<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\M_karyawan;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $karyawan = [
            'Penanggung Jawab Klinik',
            'Dokter Praktek',
            'Tenaga Keperawatan',
            'Tenaga Kesehatan Lain',
            'Tenaga SDM Lain'
        ];
       
        foreach ($karyawan as $k) {
            M_karyawan::create(
                ['kategori' => $k]
            );
        }
    }
}
