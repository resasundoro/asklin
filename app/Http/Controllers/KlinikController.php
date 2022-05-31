<?php
    
namespace App\Http\Controllers;
    
use App\Models\Klinik;
use App\Models\M_kriteria_klinik;
use App\Models\M_fasilitas_klinik;
use App\Models\Karyawan;
use App\Models\Rumah_sakit;
use App\Models\Asuransi;
use App\Models\Ruang_klinik;
use App\Models\Persyaratan;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

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
        $provinsi = Province::all();
        return view('klinik.index', compact('kriteria', 'fasilitas', 'provinsi'));
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

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = Klinik::where($where)->first();

        return Response()->json($data);
    }

    public function show($id)
    {
        $k = Klinik::find($id);
        $mkk = M_kriteria_klinik::all();
        $mfk = M_fasilitas_klinik::all();
        $kel = Village::find($k->kelurahan);
        $kec = District::find($k->kecamatan);
        $kab = Regency::find($k->kota);
        $prov = Province::find($k->provinsi);
        $pj = Karyawan::where([['id_klinik', $k->id], ['id_kategori', 1]])->get();
        $dp = Karyawan::where([['id_klinik', $k->id], ['id_kategori', 2]])->get();
        $tp = Karyawan::where([['id_klinik', $k->id], ['id_kategori', 3]])->get();
        $tkl = Karyawan::where([['id_klinik', $k->id], ['id_kategori', 4]])->get();
        $tsl = Karyawan::where([['id_klinik', $k->id], ['id_kategori', 5]])->get();
        $rs = Rumah_sakit::where('id_klinik', $k->id)->get();
        $asuransi = Asuransi::where('id_klinik', $k->id)->get();
        $rk = Ruang_klinik::join('m_ruang_klinik as mrk', 'ruang_klinik.id_ruang_klinik', '=', 'mrk.id')->select('ruang_klinik.*', 'mrk.id as mrkid', 'mrk.ruang')->where('id_klinik', $k->id)->get();
        $ps = Persyaratan::join('m_persyaratan as mps', 'persyaratan.id_persyaratan', '=', 'mps.id')->select('persyaratan.*', 'mps.id as mpsid', 'mps.kategori')->where('id_klinik', $k->id)->get();

        return view('klinik.show',compact('k', 'mkk', 'mfk', 'kel', 'kec', 'kab', 'prov', 'pj', 'dp', 'tp', 'tkl', 'tsl', 'rs', 'asuransi', 'rk', 'ps',));
    }

    public function update(Request $request)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $ID = $request->id;
        $data = Klinik::updateOrCreate(
            ['id' => $ID],
            [
                'status' => $request->status1
            ]
        );

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $file = Klinik::find($request->id);

        if(file_exists(public_path() .  '/images/klinik/' . $file->logo_klinik)) {
            unlink(public_path() .  '/images/klinik/' . $file->logo_klinik);
        }

        User::where('id_klinik', $file->id_klinik)->delete();

        $data = Klinik::where('id', $request->id)->delete();

        return Response()->json($data);
    }
}