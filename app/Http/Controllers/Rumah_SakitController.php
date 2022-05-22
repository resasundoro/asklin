<?php

namespace App\Http\Controllers;

use App\Models\Rumah_sakit;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Klinik;
use App\Models\Province;
use App\Models\Regency;

class Rumah_SakitController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:rumah-sakit-list|rumah-sakit-create|rumah-sakit-edit|rumah-sakit-delete', ['only' => ['index','show']]);
         $this->middleware('permission:rumah-sakit-create', ['only' => ['create','store']]);
         $this->middleware('permission:rumah-sakit-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:rumah-sakit-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $provinsi = Province::all();
        $kota = Regency::all();
        $klinik = Klinik::all();
        return view('rumah_sakit.index', compact('provinsi', 'kota', 'klinik'));
    }

    public function getRumah_Sakit(Request $request)
    {
        $data = Rumah_sakit::join('klinik as k', 'rumah_sakit.id_klinik', '=', 'k.id')
                            ->join('provinces as p', 'rumah_sakit.id_provinsi', '=', 'p.id')
                            ->join('regencies as r', 'rumah_sakit.id_kota', '=', 'r.id')
                            ->select(['rumah_sakit.*', 'k.id as kid', 'k.nama_klinik', 'p.id as pid', 'p.name as nama_provinsi', 'r.id as rid', 'r.name as nama_kota'])
                            ->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'rumah_sakit.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {

        $ID = $request->id;
        $data = Rumah_sakit::updateOrCreate(
            ['id' => $ID],
            [
                'id_klinik' => $request->id_klinik,
                'rs' => $request->rs,
                'alamat' => $request->alamat,
                'id_provinsi' => $request->id_provinsi,
                'id_kota' => $request->id_kota,
                'tlf' => $request->tlf,
                'jarak' => $request->jarak
            ]
        );

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = Rumah_sakit::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = Rumah_sakit::where('id',$request->id)->delete();

        return Response()->json($data);
    }
}