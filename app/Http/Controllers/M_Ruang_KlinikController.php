<?php
    
namespace App\Http\Controllers;
    
use App\Models\M_ruang_klinik;
use Illuminate\Http\Request;
use DataTables;
    
class M_Ruang_KlinikController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:m-ruang-klinik-list|m-ruang-klinik-create|m-ruang-klinik-edit|m-ruang-klinik-delete', ['only' => ['index','show']]);
         $this->middleware('permission:m-ruang-klinik-create', ['only' => ['create','store']]);
         $this->middleware('permission:m-ruang-klinik-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:m-ruang-klinik-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('m_ruang_klinik.index');
    }

    public function getM_Ruang(Request $request)
    {
        $data = M_ruang_klinik::join('users as u1', 'm_ruang_klinik.created_by', '=', 'u1.id')
                                    ->join('users as u2', 'm_ruang_klinik.updated_by', '=', 'u2.id')
                                    ->select(['m_ruang_klinik.*', 'u1.id as u1id', 'u1.name as nama1', 'u2.id as u2id', 'u2.name as nama2'])
                                    ->latest()->get();
        return Datatables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d/m-y H:i:s');
            })
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at->format('d/m-y H:i:s');
            })
            ->addIndexColumn()
            ->addColumn('action', 'm_ruang_klinik.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {

        $ruangID = $request->id;
        $data = M_ruang_klinik::updateOrCreate(
                    ['id' => $ruangID],
                    ['ruang' => $request->ruang]);    

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = M_ruang_klinik::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = M_ruang_klinik::where('id',$request->id)->delete();

        return Response()->json($data);
    }
}