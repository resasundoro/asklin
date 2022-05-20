<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
    
class WilayahController extends Controller
{
    public function getKota(request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kota = Regency::where('province_id', $id_provinsi)->get();

        echo "<option>==Pilih Kota/Kabupaten==</option>";
        foreach ($kota as $k){
            echo "<option value='$k->id'>$k->name</option>";
        }
    }

    public function getKecamatan(request $request)
    {
        $id_kota = $request->id_kota;

        $kecamatan = District::where('regency_id', $id_kota)->get();

        echo "<option>==Pilih Kecamatan==</option>";
        foreach ($kecamatan as $k){
            echo "<option value='$k->id'>$k->name</option>";
        }
    }

    public function getKelurahan(request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $kelurahan = Village::where('district_id', $id_kecamatan)->get();

        echo "<option>==Pilih Kelurahan/Desa==</option>";
        foreach ($kelurahan as $k){
            echo "<option value='$k->id'>$k->name</option>";
        }
    }
}