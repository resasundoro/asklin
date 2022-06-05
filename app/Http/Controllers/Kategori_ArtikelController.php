<?php
    
namespace App\Http\Controllers;
    
use App\Models\Kategori_artikel;
use Illuminate\Http\Request;
use DataTables;
    
class Kategori_ArtikelController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:kategori-artikel-list|kategori-artikel-create|kategori-artikel-edit|kategori-artikel-delete', ['only' => ['index','show']]);
         $this->middleware('permission:kategori-artikel-create', ['only' => ['create','store']]);
         $this->middleware('permission:kategori-artikel-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:kategori-artikel-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('backend.kategori_artikel.index');
    }

    public function getKategori_Artikel(Request $request)
    {
        $data = Kategori_artikel::join('users as u1', 'kategori_artikel.created_by', '=', 'u1.id')
        ->join('users as u2', 'kategori_artikel.updated_by', '=', 'u2.id')
        ->select(['kategori_artikel.*', 'u1.id as u1id', 'u1.name as nama1', 'u2.id as u2id', 'u2.name as nama2'])
        ->latest()->get();
        return Datatables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d/m-y H:i:s');
            })
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at->format('d/m-y H:i:s');
            })
            ->addIndexColumn()
            ->addColumn('action', 'backend.kategori_artikel.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $data = Kategori_artikel::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'slug' => \Str::slug($request->name),
                    'keywords' => $request->keywords,
                    'meta_desc' => $request->meta_desc
                ]);    

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = Kategori_artikel::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = Kategori_artikel::where('id', $request->id)->delete();

        return Response()->json($data);
    }
}