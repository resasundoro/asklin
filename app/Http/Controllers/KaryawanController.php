<?php
    
namespace App\Http\Controllers;
    
use App\Models\Karyawan;
use App\Models\M_karyawan;
use App\Models\Klinik;
use Illuminate\Http\Request;
use DataTables;
    
class KaryawanController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:karyawan-list|karyawan-create|karyawan-edit|karyawan-delete', ['only' => ['index','show']]);
         $this->middleware('permission:karyawan-create', ['only' => ['create','store']]);
         $this->middleware('permission:karyawan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:karyawan-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $klinik = Klinik::latest()->get();
        $peranan = M_karyawan::latest()->get();
        return view('karyawan.index', compact('klinik', 'peranan'));
    }

    public function getKaryawan(Request $request)
    {
        $data = Karyawan::join('m_karyawan as mk', 'karyawan.id_kategori', '=', 'mk.id')
                        ->join('kliniks as k', 'karyawan.id_klinik', '=', 'k.id')
                        ->select(['karyawan.*', 'mk.id as mkid', 'mk.kategori', 'k.id as kid', 'k.nama_klinik'])
                        ->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'karyawan.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {

        $ID = $request->id;
        $data = Karyawan::updateOrCreate(
            ['id' => $ID],
            [
                'id_klinik' => $request->id_klinik,
                'nama' => $request->nama,
                'id_kategori' => $request->id_kategori,
                'npa_idi' => $request->npa_idi,
                'no_str' => $request->no_str,
                'tgl_akhir_sip' => $request->tgl_akhir_sip,
                'no_tlf' => $request->no_tlf,
                'no_sib_sik' => $request->no_sib_sik,
                'tgl_akhir_str' => $request->tgl_akhir_str,
                'ket_sib_sik' => $request->ket_sib_sik,
                'farmasi_apoteker' => $request->farmasi_apoteker,
                'ijazah_terakhir' => $request->ijazah_terakhir,
                'jabatan' => $request->jabatan
            ]
        );

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = Karyawan::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = Karyawan::where('id', $request->id)->delete();

        return Response()->json($data);
    }
}