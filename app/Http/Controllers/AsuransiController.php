<?php

namespace App\Http\Controllers;

use App\Models\Asuransi;
use Illuminate\Http\Request;

class AsuransiController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:asuransi-list|asuransi-create|asuransi-edit|asuransi-delete', ['only' => ['index','show']]);
         $this->middleware('permission:asuransi-create', ['only' => ['create','store']]);
         $this->middleware('permission:asuransi-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:asuransi-delete', ['only' => ['destroy']]);
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
            $asuransi = Asuransi::find($id);
            $kerja = $asuransi->kerjasama;
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
        $file = Asuransi::find($request->id);

        unlink(public_path() .  '/images/klinik/asuransi/' . $file->kerjasama);

        $data = Asuransi::where('id',$file->id)->delete();

        return Response()->json($data);
    }
}