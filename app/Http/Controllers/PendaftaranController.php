<?php

namespace App\Http\Controllers;

use App\Models\Klinik;
use App\Models\M_kriteria_klinik;
use App\Models\M_fasilitas_klinik;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
    
class PendaftaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran.index');
    }

    public function edit()
    {
        $p = Klinik::find(Auth::user()->id_klinik);
        $kriteria = M_kriteria_klinik::latest()->get();
        $fasilitas = M_fasilitas_klinik::latest()->get();
        $provinsi = Province::all();
        $kota = Regency::all();
        $kecamatan = District::where('regency_id', $p->kota)->get();
        $kelurahan = Village::where('district_id', $p->kecamatan)->get();
        return view('pendaftaran.edit', compact('p', 'kriteria', 'fasilitas', 'provinsi', 'kota', 'kecamatan', 'kelurahan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_klinik' => 'required',
            'logo_klinik' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $kriteria = implode(",", $request->kriteria);
        $fasilitas = implode(",", $request->fasilitas);
        $layanan = implode(",", $request->layanan);

        $klinik = Klinik::find($id);
        $klinik->update(
            [
                'id' => $request->id,
                'asklin' => $request->asklin,
                'no_anggota' => $request->no_anggota,
                'nama_klinik' => $request->nama_klinik,
                'no_ijin_klinik' => $request->no_ijin_klinik,
                'tgl_terbit_ijin_klinik' => $request->tgl_terbit_ijin_klinik,
                'masa_berlaku_ijin_klinik' => $request->masa_berlaku_ijin_klinik,
                'nama_pendaftar' => $request->nama_pendaftar,
                'email_pendaftar' => $request->email_pendaftar,
                'tlf_pendaftar' => $request->tlf_pendaftar,
                'status_pendaftar' => $request->status_pendaftar,
                'nama_pemilik' => $request->nama_pemilik,
                'jenis_klinik' => $request->jenis_klinik,
                'status_kepemilikan_klinik' => $request->status_kepemilikan_klinik,
                'tlf_klinik' => $request->tlf_klinik,
                'alamat_klinik' => $request->alamat_klinik,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kota' => $request->kota,
                'provinsi' => $request->provinsi,
                'kode_pos' => $request->kode_pos,
                'bentuk_badan_usaha' => $request->bentuk_badan_usaha,
                'bentuk_badan_hukum' => $request->bentuk_badan_hukum,
                'nama_badan' => $request->nama_badan,
                'kriteria' => $kriteria,
                'fasilitas' => $fasilitas,
                'layanan' => $layanan,
            ]
        );

        return redirect()->route('pendaftaran.edit')->with('success','Klinik berhasil diperbarui');
    }

    public function sdm()
    {
        return view('pendaftaran.sdm');
    }
}