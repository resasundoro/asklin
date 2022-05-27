<?php

namespace App\Http\Controllers;

use App\Models\Asuransi;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Klinik;

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
        $klinik = Klinik::all();
        return view('asuransi.index', compact('klinik'));
    }

    public function getAsuransi(Request $request)
    {
        $data = Asuransi::join('klinik as k', 'asuransi.id_klinik', '=', 'k.id')
                            ->select(['asuransi.*', 'k.id as kid', 'k.nama_klinik'])
                            ->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'asuransi.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'asuransi' => 'required',
            'kerjasama' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($kerjasama = $request->file('kerjasama')) {
            $destinationPath = 'images/klinik/asuransi/';
            $kerja = date('YmdHis') . "-" . uniqid() . "." . $kerjasama->getClientOriginalExtension();
            $kerjasama->move($destinationPath, $kerja);
        }else{
            $kerja = NULL;
        }

        $ID = $request->id;
        $data = Asuransi::updateOrCreate(
            ['id' => $ID],
            [
                'id_klinik' => $request->id_klinik,
                'asuransi' => $request->asuransi,
                'alamat' => $request->alamat,
                'kontak' => $request->kontak,
                'tlf' => $request->tlf,
                'kerjasama' => $kerja
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