<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\M_kriteria_klinik;

class KriteriaKlinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = [
            'Rawat Jalan',
            'Rawat Inap'
        ];
       
        foreach ($kriteria as $k) {
            M_kriteria_klinik::create(
                ['kriteria' => $k]
            );
        }
    }
}
