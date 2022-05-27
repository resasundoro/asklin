<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\M_fasilitas_klinik;

class FasilitasKlinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fasilitas = [
            'Ruang Nifas',
            'Tersedia Ruang Operasi',
            'Kamar Bersalin'
        ];
       
        foreach ($fasilitas as $f) {
            M_fasilitas_klinik::create(
                ['fasilitas' => $f]
            );
        }
    }
}
