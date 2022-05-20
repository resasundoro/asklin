<?php
    
namespace App\Http\Controllers;
    
use App\Models\M_kriteria_klinik;
use Illuminate\Http\Request;
use DataTables;
    
class M_Kriteria_KlinikController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:m-kriteria-klinik-list|m-kriteria-klinik-create|m-kriteria-klinik-edit|m-kriteria-klinik-delete', ['only' => ['index','show']]);
         $this->middleware('permission:m-kriteria-klinik-create', ['only' => ['create','store']]);
         $this->middleware('permission:m-kriteria-klinik-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:m-kriteria-klinik-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('kriteria_klinik.index');
    }

    public function getKriteria(Request $request)
    {
        $data = M_kriteria_klinik::join('users as u1', 'm_kriteria_kliniks.created_by', '=', 'u1.id')
                                    ->join('users as u2', 'm_kriteria_kliniks.updated_by', '=', 'u2.id')
                                    ->select(['m_kriteria_kliniks.*', 'u1.id as u1id', 'u1.name as nama1', 'u2.id as u2id', 'u2.name as nama2'])
                                    ->latest()->get();
        return Datatables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d/m-y H:i:s');
            })
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at->format('d/m-y H:i:s');
            })
            ->addIndexColumn()
            ->addColumn('action', 'kriteria_klinik.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {

        $kriteriaID = $request->id;
        $data = M_kriteria_klinik::updateOrCreate(
                    ['id' => $kriteriaID],
                    ['kriteria' => $request->kriteria]);    

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = M_kriteria_klinik::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = M_kriteria_klinik::where('id',$request->id)->delete();

        return Response()->json($data);
    }
}