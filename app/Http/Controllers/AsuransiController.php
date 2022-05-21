<?php

namespace App\Http\Controllers;

use App\Models\Asuransi;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Klinik;
use App\Models\Province;
use App\Models\Regency;

class AsuransiController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:asuransi-list|asuransi-create|asuransi-edit|asuransi-delete', ['only' => ['index','show']]);
         $this->middleware('permission:asuransi-create', ['only' => ['create','store']]);
         $this->middleware('permission:asuransi-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:asuransi-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $provinsi = Province::all();
        $kota = Regency::all();
        $klinik = Klinik::all();
        return view('asuransi.index', compact('provinsi', 'kota', 'klinik'));
    }

    public function getAsuransi(Request $request)
    {
        $data = Asuransi::join('kliniks as k', 'asuransi.id_klinik', '=', 'k.id')
                            ->join('provinces as p', 'asuransi.id_provinsi', '=', 'p.id')
                            ->join('regencies as r', 'asuransi.id_kota', '=', 'r.id')
                            ->select(['asuransi.*', 'k.id as kid', 'k.nama_klinik', 'p.id as pid', 'p.name as nama_provinsi', 'r.id as rid', 'r.name as nama_kota'])
                            ->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'asuransi.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {

        $ID = $request->id;
        $data = Asuransi::updateOrCreate(
            ['id' => $ID],
            [
                'id_klinik' => $request->id_klinik,
                'asuransi' => $request->asuransi,
                'alamat' => $request->alamat,
                'id_provinsi' => $request->id_provinsi,
                'id_kota' => $request->id_kota,
                'kontak' => $request->kontak,
                'tlf' => $request->tlf
            ]
        );

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = Asuransi::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = Asuransi::where('id',$request->id)->delete();

        return Response()->json($data);
    }
}