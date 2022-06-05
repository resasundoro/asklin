<?php

namespace App\Http\Controllers;

use App\Models\Surveyor;
use Illuminate\Http\Request;
use DataTables;
use App\Models\{User, Province, Regency, District, Village};

class SurveyorController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:surveyor-list|surveyor-create|surveyor-edit|surveyor-delete', ['only' => ['index','show']]);
         $this->middleware('permission:surveyor-create', ['only' => ['create','store']]);
         $this->middleware('permission:surveyor-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:surveyor-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $provinsi = Province::all();
        $kota = Regency::all();
        $kecamatan = District::all();
        $kelurahan = Village::all();
        $user = User::role('Surveyor')->get();
        return view('backend.surveyor.index', compact('provinsi', 'kota', 'kecamatan', 'kelurahan', 'user'));
    }

    public function getSurveyor(Request $request)
    {
        $data = Surveyor::join('users as u', 'surveyor.id_user', '=', 'u.id')
                            ->join('provinces as p', 'surveyor.id_provinsi', '=', 'p.id')
                            ->join('regencies as r', 'surveyor.id_kota', '=', 'r.id')
                            ->join('districts as d', 'surveyor.id_kecamatan', '=', 'd.id')
                            ->join('villages as v', 'surveyor.id_kelurahan', '=', 'v.id')
                            ->select([
                                'surveyor.*', 'u.id as uid', 'u.name', 'u.email', 'p.id as pid', 'p.name as nama_provinsi', 'r.id as rid', 'r.name as nama_kota',
                                'd.id as did', 'd.name as nama_kecamatan', 'v.id as vid', 'v.name as nama_kelurahan'
                            ])
                            ->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'backend.surveyor.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {
        if ($foto = $request->file('foto')) {
            $destinationPath = 'images/surveyor/';
            $fotosurveyor = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $fotosurveyor);
        }else{
            unset($fotosurveyor);
        }

        $ID = $request->id;
        $data = Surveyor::updateOrCreate(
            ['id' => $ID],
            [
                'id_user' => $request->id_user,
                'foto' => $fotosurveyor,
                'tlf' => $request->tlf,
                'jabatan' => $request->jabatan,
                'alamat' => $request->alamat,
                'id_provinsi' => $request->id_provinsi,
                'id_kota' => $request->id_kota,
                'id_kecamatan' => $request->id_kecamatan,
                'id_kelurahan' => $request->id_kelurahan,
            ]
        );

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = Surveyor::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = Surveyor::where('id',$request->id)->delete();

        return Response()->json($data);
    }
}