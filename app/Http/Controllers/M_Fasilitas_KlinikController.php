<?php
    
namespace App\Http\Controllers;
    
use App\Models\M_fasilitas_klinik;
use Illuminate\Http\Request;
use DataTables;
    
class M_Fasilitas_KlinikController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:m-fasilitas-klinik-list|m-fasilitas-klinik-create|m-fasilitas-klinik-edit|m-fasilitas-klinik-delete', ['only' => ['index','show']]);
         $this->middleware('permission:m-fasilitas-klinik-create', ['only' => ['create','store']]);
         $this->middleware('permission:m-fasilitas-klinik-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:m-fasilitas-klinik-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('backend.fasilitas_klinik.index');
    }

    public function getFasilitas(Request $request)
    {
        $data = M_fasilitas_klinik::join('users as u1', 'm_fasilitas_klinik.created_by', '=', 'u1.id')
                                    ->join('users as u2', 'm_fasilitas_klinik.updated_by', '=', 'u2.id')
                                    ->select(['m_fasilitas_klinik.*', 'u1.id as u1id', 'u1.name as nama1', 'u2.id as u2id', 'u2.name as nama2'])
                                    ->latest()->get();
        return Datatables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d/m-y H:i:s');
            })
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at->format('d/m-y H:i:s');
            })
            ->addIndexColumn()
            ->addColumn('action', 'backend.fasilitas_klinik.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {

        $fasilitasID = $request->id;
        $data = M_fasilitas_klinik::updateOrCreate(
                    ['id' => $fasilitasID],
                    ['fasilitas' => $request->fasilitas]);    

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = M_fasilitas_klinik::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = M_fasilitas_klinik::where('id',$request->id)->delete();

        return Response()->json($data);
    }
}