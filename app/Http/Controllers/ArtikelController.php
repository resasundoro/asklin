<?php
    
namespace App\Http\Controllers;
    
use App\Models\{Kategori_artikel, Tags_artikel, Artikel};
use Illuminate\Http\Request;
use DataTables;
use Auth;
    
class ArtikelController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:artikel-list|artikel-create|artikel-edit|artikel-delete', ['only' => ['index','show']]);
         $this->middleware('permission:artikel-create', ['only' => ['create','store']]);
         $this->middleware('permission:artikel-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:artikel-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $kategori = Kategori_artikel::all();
        $tags = Tags_artikel::all();

        return view('backend.artikel.index', compact('kategori', 'tags'));
    }

    public function getArtikel(Request $request)
    {
        $data = Artikel::join('users as u1', 'artikel.created_by', '=', 'u1.id')
        ->join('users as u2', 'artikel.updated_by', '=', 'u2.id')
        ->join('kategori_artikel as ka', 'artikel.id_kategori', '=', 'ka.id')
        ->select(['artikel.*', 'u1.id as u1id', 'u1.name as nama1', 'u2.id as u2id', 'u2.name as nama2', 'ka.id as kaid,', 'ka.name as nm_kategori'])
        ->latest()->get();
        return Datatables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d/m-y H:i:s');
            })
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at->format('d/m-y H:i:s');
            })
            ->addIndexColumn()
            ->addColumn('action', 'backend.artikel.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'cover' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'title' => 'required|unique:artikel,title',
            'desc' => 'required',
        ]);

        if ($cover = $request->file('cover')) {
            $destinationPath = 'images/blog/';
            $COVER = date('YmdHis') . "." . $cover->getClientOriginalExtension();
            $cover->move($destinationPath, $COVER);
        } else {
            $cek = Artikel::find($request->id);
            $COVER = $cek->cover;
        }

        $post = Artikel::updateOrCreate(
            ['id' => $request->id],
            [
                'id_kategori' => $request->id_kategori,
                'id_tags' => implode(',', $request->id_tags),
                'title' => $request->title,
                'cover' => $COVER,
                'slug' => \Str::slug($request->title),
                'desc' => $request->desc,
                'keywords' => $request->keywords,
                'meta_desc' => $request->meta_desc
            ]);

        return Response()->json($post);
    }

    public function edit(Request $request)
    {
        $data  = Artikel::find($request->id);

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $file = Artikel::find($request->id);
        if($file->cover !== NULL){
            unlink(public_path() .  '/images/blog/' . $file->cover);
        }
        $data = Artikel::where('id', $request->id)->delete();

        return Response()->json($data);
    }
}