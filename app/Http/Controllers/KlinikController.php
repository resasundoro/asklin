<?php
    
namespace App\Http\Controllers;
    
use App\Models\{Klinik, M_kriteria_klinik, M_fasilitas_klinik, Karyawan, Rumah_sakit, Asuransi, Ruang_klinik, Persyaratan, Province, Regency, District, Village, User};
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
        return view('backend.klinik.index', compact('kriteria', 'fasilitas', 'provinsi'));
    }

    public function getKlinik(Request $request)
    {
        $data = Klinik::join('regencies', 'klinik.kota', '=', 'regencies.id')
                        ->select('klinik.*', 'regencies.id as rid', 'regencies.name')
                        ->where('status', '!=', '0')
                        ->latest()->get();
        return Datatables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d-m-y H:i:s');
            })
            ->addIndexColumn()
            ->addColumn('action', 'backend.klinik.action')
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

        return view('backend.klinik.show',compact('k', 'mkk', 'mfk', 'kel', 'kec', 'kab', 'prov', 'pj', 'dp', 'tp', 'tkl', 'tsl', 'rs', 'asuransi', 'rk', 'ps',));
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

        if($file->logo_klinik !== NULL) {
            if(file_exists(public_path() .  '/images/klinik/' . $file->logo_klinik)) {
                unlink(public_path() .  '/images/klinik/' . $file->logo_klinik);
            }
        }

        $data = Klinik::where('id', $request->id)->delete();

        return Response()->json($data);
    }
}