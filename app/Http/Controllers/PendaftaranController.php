<?php

namespace App\Http\Controllers;

use App\Models\Klinik;
use App\Models\M_kriteria_klinik;
use App\Models\M_fasilitas_klinik;
use App\Models\Karyawan;
use App\Models\Rumah_sakit;
use App\Models\Asuransi;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\M_ruang_klinik;
use App\Models\Ruang_klinik;
use App\Models\M_persyaratan;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        $k = Klinik::join('villages as v', 'klinik.kelurahan', '=', 'v.id')
            ->join('districts as d', 'klinik.kecamatan', '=', 'd.id')
            ->join('regencies as r', 'klinik.kota', '=', 'r.id')
            ->join('provinces as p', 'klinik.provinsi', '=', 'p.id')
            ->select('klinik.*', 'v.id as vid', 'v.name as nama_kelurahan', 'd.id as did', 'd.name as nama_kecamatan', 'r.id as rid', 'r.name as nama_kota', 'p.id as pid', 'p.name as nama_provinsi')
            ->find(Auth::user()->id_klinik);
        $mfk = M_fasilitas_klinik::all();
        $pj = Karyawan::where([['id_klinik', Auth::user()->id_klinik], ['id_kategori', 1]])->get();
        $dp = Karyawan::where([['id_klinik', Auth::user()->id_klinik], ['id_kategori', 2]])->get();
        $tp = Karyawan::where([['id_klinik', Auth::user()->id_klinik], ['id_kategori', 3]])->get();
        $tkl = Karyawan::where([['id_klinik', Auth::user()->id_klinik], ['id_kategori', 4]])->get();
        $tsl = Karyawan::where([['id_klinik', Auth::user()->id_klinik], ['id_kategori', 5]])->get();
        $rs = Rumah_sakit::where('id_klinik', Auth::user()->id_klinik)->get();
        $asuransi = Asuransi::where('id_klinik', Auth::user()->id_klinik)->get();
        $rk = Ruang_klinik::join('m_ruang_klinik as mrk', 'ruang_klinik.id_ruang_klinik', '=', 'mrk.id')->select('ruang_klinik.*', 'mrk.id as mrkid', 'mrk.ruang')->where('id_klinik', Auth::user()->id_klinik)->get();
        $ps = Persyaratan::join('m_persyaratan as mps', 'persyaratan.id_persyaratan', '=', 'mps.id')->select('persyaratan.*', 'mps.id as mpsid', 'mps.kategori')->where('id_klinik', Auth::user()->id_klinik)->get();
        return view('pendaftaran.index', compact('k', 'pj', 'dp', 'tp', 'tkl', 'tsl', 'rs', 'asuransi', 'rk', 'ps', 'mfk'));
    }

    public function edit()
    {
        $p = Klinik::find(Auth::user()->id_klinik);
        $kriteria = M_kriteria_klinik::latest()->get();
        $fasilitas = M_fasilitas_klinik::latest()->get();
        $provinsi = Province::all();
        $kota = Regency::where('province_id', $p->provinsi)->get();
        $kecamatan = District::where('regency_id', $p->kota)->get();
        $kelurahan = Village::where('district_id', $p->kecamatan)->get();
        return view('pendaftaran.edit', compact('p', 'kriteria', 'fasilitas', 'provinsi', 'kota', 'kecamatan', 'kelurahan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_klinik' => 'required',
            'logo_klinik' => 'mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $kriteria = implode(",", $request->kriteria);
        $fasilitas = implode(",", $request->fasilitas);
        $layanan = implode(",", $request->layanan);

        if ($logo_klinik = $request->file('logo_klinik')) {
            $destinationPath = 'images/klinik';
            $profilKlinik = date('YmdHis') . "-" . uniqid() . "." . $logo_klinik->getClientOriginalExtension();
            $logo_klinik->move($destinationPath, $profilKlinik);
        } else {
            $klinik = Klinik::find($id);
            $profilKlinik = $klinik->logo_klinik;
        }

        $klinik = Klinik::find($id);
        $klinik->update(
            [
                'id' => $request->id,
                'asklin' => $request->asklin,
                'no_anggota' => $request->no_anggota,
                'nama_klinik' => $request->nama_klinik,
                'logo_klinik' => $profilKlinik,
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
                'status' => "1"
            ]
        );

        return redirect()->route('pendaftaran.sdm')->with('success','Klinik berhasil diperbarui');
    }

    public function sdm()
    {
        $pj = Karyawan::where([['id_klinik', Auth::user()->id_klinik], ['id_kategori', 1]])->get();
        $dp = Karyawan::where([['id_klinik', Auth::user()->id_klinik], ['id_kategori', 2]])->get();
        $tp = Karyawan::where([['id_klinik', Auth::user()->id_klinik], ['id_kategori', 3]])->get();
        $tkl = Karyawan::where([['id_klinik', Auth::user()->id_klinik], ['id_kategori', 4]])->get();
        $tsl = Karyawan::where([['id_klinik', Auth::user()->id_klinik], ['id_kategori', 5]])->get();
        $rs = Rumah_sakit::where('id_klinik', Auth::user()->id_klinik)->get();
        $asuransi = Asuransi::where('id_klinik', Auth::user()->id_klinik)->get();
        $mrk = M_ruang_klinik::all();
        $rk = Ruang_klinik::join('m_ruang_klinik as mrk', 'ruang_klinik.id_ruang_klinik', '=', 'mrk.id')->select('ruang_klinik.*', 'mrk.id as mrkid', 'mrk.ruang')->where('id_klinik', Auth::user()->id_klinik)->get();
        $mps = M_persyaratan::all();
        $ps = Persyaratan::join('m_persyaratan as mps', 'persyaratan.id_persyaratan', '=', 'mps.id')->select('persyaratan.*', 'mps.id as mpsid', 'mps.kategori')->where('id_klinik', Auth::user()->id_klinik)->get();
        return view('pendaftaran.sdm', compact('pj', 'dp', 'tp', 'tkl', 'tsl', 'rs', 'asuransi', 'mrk', 'rk', 'ps', 'mps'));
    }

    public function draft(Request $request)
    {
        $data = Klinik::find(Auth::user()->id_klinik)->update(['status' => "3"]);
        return redirect()->route('pendaftaran')->with('success','Status Pendaftaran Anda "DRAFT"');
    }

    public function submit(Request $request)
    {
        $data = Klinik::find(Auth::user()->id_klinik)->update(['status' => "4"]);
        return redirect()->route('pendaftaran')->with('success','Status Pendaftaran Anda "Waiting Approval"');
    }
}