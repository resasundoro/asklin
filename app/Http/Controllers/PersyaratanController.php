<?php

namespace App\Http\Controllers;

use App\Models\Persyaratan;
use Illuminate\Http\Request;

class PersyaratanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:persyaratan-list|persyaratan-create|persyaratan-edit|persyaratan-delete', ['only' => ['index','show']]);
        $this->middleware('permission:persyaratan-create', ['only' => ['create','store']]);
        $this->middleware('permission:persyaratan-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:persyaratan-delete', ['only' => ['destroy']]);
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
        }

        $data = Persyaratan::Create(
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

    public function update(Request $request)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $ID = $request->id;
        $data = Persyaratan::updateOrCreate(
            ['id' => $ID],
            [
                'status' => $request->status,
                'keterangan' => $request->keterangan,
            ]
        );

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $file = Persyaratan::find($request->id);

        if(file_exists(public_path() .  '/images/klinik/syarat/' . $file->dokumen)) {
            unlink(public_path() .  '/images/klinik/syarat/' . $file->dokumen);
        }

        $data = Persyaratan::where('id',$file->id)->delete();

        return Response()->json($data);
    }
}