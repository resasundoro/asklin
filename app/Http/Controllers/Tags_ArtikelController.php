<?php
    
namespace App\Http\Controllers;
    
use App\Models\Tags_artikel;
use Illuminate\Http\Request;
use DataTables;
    
class Tags_ArtikelController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:tags-artikel-list|tags-artikel-create|tags-artikel-edit|tags-artikel-delete', ['only' => ['index','show']]);
         $this->middleware('permission:tags-artikel-create', ['only' => ['create','store']]);
         $this->middleware('permission:tags-artikel-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:tags-artikel-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('backend.tags_artikel.index');
    }

    public function getTags_Artikel(Request $request)
    {
        $data = Tags_artikel::join('users as u1', 'tags_artikel.created_by', '=', 'u1.id')
        ->join('users as u2', 'tags_artikel.updated_by', '=', 'u2.id')
        ->select(['tags_artikel.*', 'u1.id as u1id', 'u1.name as nama1', 'u2.id as u2id', 'u2.name as nama2'])
        ->latest()->get();
        return Datatables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d/m-y H:i:s');
            })
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at->format('d/m-y H:i:s');
            })
            ->addIndexColumn()
            ->addColumn('action', 'backend.tags_artikel.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $data = Tags_artikel::updateOrCreate(
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
        $data  = Tags_artikel::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = Tags_artikel::where('id', $request->id)->delete();

        return Response()->json($data);
    }
}