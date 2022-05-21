<?php
    
namespace App\Http\Controllers;
    
use App\Models\Klinik;
use App\Models\M_kriteria_klinik;
use App\Models\M_fasilitas_klinik;
use App\Models\M_layanan_klinik;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class KlinikController extends Controller
{ 
    function __construct()
    {
        $this->middleware('permission:klinik-list|klinik-create|klinik-edit|klinik-delete', ['only' => ['index','show']]);
        $this->middleware('permission:klinik-create', ['only' => ['create','store']]);
        $this->middleware('permission:klinik-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:klinik-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $kriteria = M_kriteria_klinik::latest()->get();
        $fasilitas = M_fasilitas_klinik::latest()->get();
        $layanan = M_layanan_klinik::latest()->get();
        $provinsi = Province::all();
        return view('klinik.index', compact('kriteria', 'fasilitas', 'layanan','provinsi'));
    }

    public function getKlinik(Request $request)
    {
        $data = Klinik::join('regencies', 'klinik.kota', '=', 'regencies.id')
                        ->select('klinik.*', 'regencies.id as rid', 'regencies.name')
                        ->latest()->get();
        return Datatables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d-m-y H:i:s');
            })
            ->addIndexColumn()
            ->addColumn('action', 'klinik.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_klinik' => 'required',
            'logo_klinik' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($logo_klinik = $request->file('logo_klinik')) {
            $destinationPath = 'images/';
            $profilKlinik = date('YmdHis') . "." . $logo_klinik->getClientOriginalExtension();
            $logo_klinik->move($destinationPath, $profilKlinik);
        }

        $kriteria = implode(",", $request->kriteria);
        $fasilitas = implode(",", $request->fasilitas);
        $layanan = implode(",", $request->layanan);
        $data = Klinik::Create(
            [
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
            ]
        );

        return Response()->json($data);
    }

    public function edit(Klinik $klinik)
    {
        $kriteria = M_kriteria_klinik::latest()->get();
        $fasilitas = M_fasilitas_klinik::latest()->get();
        $layanan = M_layanan_klinik::latest()->get();
        $provinsi = Province::all();
        $kota = Regency::where('province_id', $klinik->provinsi)->get();
        $kecamatan = District::where('regency_id', $klinik->kota)->get();
        $desa = Village::where('district_id', $klinik->kecamatan)->get();
        return view('klinik.edit',compact('klinik', 'kriteria', 'fasilitas', 'layanan', 'provinsi', 'kota', 'kecamatan', 'desa'));
    }

    public function update(Request $request, Klinik $klinik)
    {
        $request->validate([
            'nama_klinik' => 'required',
            'logo_klinik' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($logo_klinik = $request->file('logo_klinik')) {
            $destinationPath = 'images/';
            $profilKlinik = date('YmdHis') . "." . $logo_klinik->getClientOriginalExtension();
            $logo_klinik->move($destinationPath, $profilKlinik);
        }

        $kriteria = implode(",", $request->kriteria);
        $fasilitas = implode(",", $request->fasilitas);
        $layanan = implode(",", $request->layanan);
        $klinik->update(
            [
                'id' => $request->id,
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
            ]
        );

        return redirect()->route('klinik.index')
                        ->with('success','Klinik berhasil diperbarui');
    }

    public function lihat(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = Klinik::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = Klinik::where('id', $request->id)->delete();

        return Response()->json($data);
    }
    
}