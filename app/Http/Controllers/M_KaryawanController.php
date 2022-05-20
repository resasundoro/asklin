<?php
    
namespace App\Http\Controllers;
    
use App\Models\M_karyawan;
use Illuminate\Http\Request;
use DataTables;
    
class M_KaryawanController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:m-karyawan-list|m-karyawan-create|m-karyawan-edit|m-karyawan-delete', ['only' => ['index','show']]);
         $this->middleware('permission:m-karyawan-create', ['only' => ['create','store']]);
         $this->middleware('permission:m-karyawan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:m-karyawan-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('m_karyawan.index');
    }

    public function getM_Karyawan(Request $request)
    {
        $data = M_karyawan::join('users as u1', 'm_karyawans.created_by', '=', 'u1.id')
        ->join('users as u2', 'm_karyawans.updated_by', '=', 'u2.id')
        ->select(['m_karyawans.*', 'u1.id as u1id', 'u1.name as nama1', 'u2.id as u2id', 'u2.name as nama2'])
        ->latest()->get();
        return Datatables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d/m-y H:i:s');
            })
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at->format('d/m-y H:i:s');
            })
            ->addIndexColumn()
            ->addColumn('action', 'm_karyawan.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {

        $kategoriID = $request->id;
        $data = M_karyawan::updateOrCreate(
                    ['id' => $kategoriID],
                    ['kategori' => $request->kategori]);    

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = M_karyawan::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = M_karyawan::where('id',$request->id)->delete();

        return Response()->json($data);
    }
}