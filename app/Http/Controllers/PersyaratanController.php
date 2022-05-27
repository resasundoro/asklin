<?php

namespace App\Http\Controllers;

use App\Models\Persyaratan;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Klinik;
use App\Models\M_persyaratan;

class PersyaratanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:persyaratan-list|persyaratan-create|persyaratan-edit|persyaratan-delete', ['only' => ['index','show']]);
        $this->middleware('permission:persyaratan-create', ['only' => ['create','store']]);
        $this->middleware('permission:persyaratan-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:persyaratan-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $klinik = Klinik::all();
        $MPS = M_persyaratan::all();
        return view('persyaratan.index', compact('klinik', 'MPS'));
    }

    public function getPersyaratan(Request $request)
    {
        $data = Persyaratan::join('klinik as k', 'persyaratan.id_klinik', '=', 'k.id')
                            ->join('m_persyaratan as mps', 'persyaratan.id_persyaratan', '=', 'mps.id')
                            ->select(['persyaratan.*', 'k.id as kid', 'k.nama_klinik', 'mps.id as mpsid', 'mps.kategori'])
                            ->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'persyaratan.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokumen' => 'mimes:pdf|max:10000'
        ]);

        if ($img = $request->file('dokumen')) {
            $destinationPath = 'images/klinik/syarat/';
            $foto = date('YmdHis') . "-" . uniqid() . "." . $img->getClientOriginalExtension();
            $img->move($destinationPath, $foto);
        }else{
            $persyaratan = Persyaratan::find($id);
            $foto = $persyaratan->dokumen;
        }

        $ID = $request->id;
        $data = Persyaratan::updateOrCreate(
            ['id' => $ID],
            [
                'id_klinik' => $request->id_klinik,
                'id_persyaratan' => $request->id_persyaratan,
                'dokumen' => $foto,
                'status' => $request->status,
                'keterangan' => $request->keterangan,
            ]
        );

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = Persyaratan::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $file = Persyaratan::find($request->id);

        unlink(public_path() .  '/images/klinik/syarat/' . $file->dokumen);

        $data = Persyaratan::where('id',$file->id)->delete();

        return Response()->json($data);
    }
}