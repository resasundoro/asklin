<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\M_persyaratan;

class PersyaratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persyaratan = [
            'Dokumen Izin Klinik',
            'Dokumen SOP Klinik',
            'Surat Pernyataan',
            'Surat Kerjasama Pengolahan Limbah Medis',
            'Dokumen Referensi Lainnya'
        ];
       
        foreach ($persyaratan as $p) {
            M_persyaratan::create(
                ['kategori' => $p]
            );
        }
    }
}
