<?php
    
namespace App\Http\Controllers;
    
use App\Models\M_persyaratan;
use Illuminate\Http\Request;
use DataTables;
    
class M_PersyaratanController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:m-persyaratan-list|m-persyaratan-create|m-persyaratan-edit|m-persyaratan-delete', ['only' => ['index','show']]);
         $this->middleware('permission:m-persyaratan-create', ['only' => ['create','store']]);
         $this->middleware('permission:m-persyaratan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:m-persyaratan-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('m_persyaratan.index');
    }

    public function getM_Persyaratan(Request $request)
    {
        $data = M_persyaratan::join('users as u1', 'm_persyaratan.created_by', '=', 'u1.id')
                                    ->join('users as u2', 'm_persyaratan.updated_by', '=', 'u2.id')
                                    ->select(['m_persyaratan.*', 'u1.id as u1id', 'u1.name as nama1', 'u2.id as u2id', 'u2.name as nama2'])
                                    ->latest()->get();
        return Datatables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d/m-y H:i:s');
            })
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at->format('d/m-y H:i:s');
            })
            ->addIndexColumn()
            ->addColumn('action', 'm_persyaratan.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $ID = $request->id;
        $data = M_persyaratan::updateOrCreate(
                    ['id' => $ID],
                    ['kategori' => $request->kategori]);    

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = M_persyaratan::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = M_persyaratan::where('id',$request->id)->delete();

        return Response()->json($data);
    }
}