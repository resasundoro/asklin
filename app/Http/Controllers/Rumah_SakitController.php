<?php

namespace App\Http\Controllers;

use App\Models\Rumah_sakit;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Klinik;

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
        $klinik = Klinik::all();
        return view('rumah_sakit.index', compact('klinik'));
    }

    public function getRumah_Sakit(Request $request)
    {
        $data = Rumah_sakit::join('klinik as k', 'rumah_sakit.id_klinik', '=', 'k.id')
                            ->select(['rumah_sakit.*', 'k.id as kid', 'k.nama_klinik'])
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