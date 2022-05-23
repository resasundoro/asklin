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
                        ->join('klinik as k', 'karyawan.id_klinik', '=', 'k.id')
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
        if ($foto_str = $request->file('foto_str')) {
            $destinationPath = 'images/klinik/sdm/';
            $foto_STR = date('YmdHis') . "-" . uniqid() . "." . $foto_str->getClientOriginalExtension();
            $foto_str->move($destinationPath, $foto_STR);
        }else{
            $foto_STR = NULL;
        }

        if ($foto_sip = $request->file('foto_sip')) {
            $destinationPath = 'images/klinik/sdm/';
            $foto_SIP = date('YmdHis') . "." . $foto_sip->getClientOriginalExtension();
            $foto_sip->move($destinationPath, $foto_SIP);
        }else{
            $foto_SIP = NULL;
        }

        if ($foto_ijazah = $request->file('foto_ijazah')) {
            $destinationPath = 'images/klinik/sdm/';
            $foto_IJAZAH = date('YmdHis') . "." . $foto_ijazah->getClientOriginalExtension();
            $foto_ijazah->move($destinationPath, $foto_IJAZAH);
        }else{
            $foto_IJAZAH = NULL;
        }

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
                'no_sip' => $request->no_sip,
                'no_sib_sik' => $request->no_sib_sik,
                'tgl_akhir_str' => $request->tgl_akhir_str,
                'ket_sib_sik' => $request->ket_sib_sik,
                'farmasi_apoteker' => $request->farmasi_apoteker,
                'ijazah_terakhir' => $request->ijazah_terakhir,
                'jabatan' => $request->jabatan,
                'foto_sip' => $foto_SIP,
                'foto_str' => $foto_STR,
                'foto_ijazah' => $foto_IJAZAH
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