<?php
    
namespace App\Http\Controllers;
    
use App\Models\M_layanan_klinik;
use Illuminate\Http\Request;
use DataTables;
    
class M_Layanan_KlinikController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:m-layanan-klinik-list|m-layanan-klinik-create|m-layanan-klinik-edit|m-layanan-klinik-delete', ['only' => ['index','show']]);
         $this->middleware('permission:m-layanan-klinik-create', ['only' => ['create','store']]);
         $this->middleware('permission:m-layanan-klinik-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:m-layanan-klinik-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('layanan_klinik.index');
    }

    public function getLayanan(Request $request)
    {
        $data = M_layanan_klinik::join('users as u1', 'm_layanan_klinik.created_by', '=', 'u1.id')
                                    ->join('users as u2', 'm_layanan_klinik.updated_by', '=', 'u2.id')
                                    ->select(['m_layanan_klinik.*', 'u1.id as u1id', 'u1.name as nama1', 'u2.id as u2id', 'u2.name as nama2'])
                                    ->latest()->get();
        return Datatables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d/m-y H:i:s');
            })
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at->format('d/m-y H:i:s');
            })
            ->addIndexColumn()
            ->addColumn('action', 'layanan_klinik.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {

        $layananID = $request->id;
        $data = M_layanan_klinik::updateOrCreate(
                    ['id' => $layananID],
                    ['layanan' => $request->layanan]);    

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = M_layanan_klinik::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = M_layanan_klinik::where('id',$request->id)->delete();

        return Response()->json($data);
    }
}