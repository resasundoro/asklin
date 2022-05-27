<?php

namespace App\Http\Controllers;

use App\Models\Ruang_klinik;
use App\Models\M_ruang_klinik;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Klinik;

class Ruang_KlinikController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ruang-klinik-list|ruang-klinik-create|ruang-klinik-edit|ruang-klinik-delete', ['only' => ['index','show']]);
        $this->middleware('permission:ruang-klinik-create', ['only' => ['create','store']]);
        $this->middleware('permission:ruang-klinik-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:ruang-klinik-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $m_ruang_klinik = M_ruang_klinik::all();
        $klinik = Klinik::all();
        return view('ruang_klinik.index', compact('klinik', 'm_ruang_klinik'));
    }

    public function getRuang(Request $request)
    {
        $data = Ruang_klinik::join('klinik as k', 'ruang_klinik.id_klinik', '=', 'k.id')
                            ->join('m_ruang_klinik as mrk', 'ruang_klinik.id_ruang_klinik', '=', 'mrk.id')
                            ->select(['ruang_klinik.*', 'k.id as kid', 'k.nama_klinik', 'mrk.id as mrkid', 'mrk.ruang as ruangklinik'])
                            ->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'ruang_klinik.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        if ($img = $request->file('foto')) {
            $destinationPath = 'images/klinik/ruang_klinik/';
            $foto = date('YmdHis') . "-" . uniqid() . "." . $img->getClientOriginalExtension();
            $img->move($destinationPath, $foto);
        }else{
            $ruang = Ruang_klinik::find($id);
            $foto = $ruang->foto;
        }

        $ID = $request->id;
        $data = Ruang_klinik::updateOrCreate(
            ['id' => $ID],
            [
                'id_klinik' => $request->id_klinik,
                'id_ruang_klinik' => $request->id_ruang_klinik,
                'foto' => $foto
            ]
        );

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = Ruang_klinik::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $file = Ruang_klinik::find($request->id);

        unlink(public_path() .  '/images/klinik/ruang_klinik/' . $file->foto);

        $data = Ruang_klinik::where('id',$file->id)->delete();

        return Response()->json($data);
    }
}