<?php
    
namespace App\Http\Controllers;
    
use App\Models\Paket;
use Illuminate\Http\Request;
use DataTables;
    
class PaketController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:paket-list|paket-create|paket-edit|paket-delete', ['only' => ['index','show']]);
         $this->middleware('permission:paket-create', ['only' => ['create','store']]);
         $this->middleware('permission:paket-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:paket-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('paket.index');
    }

    public function getPaket(Request $request)
    {
        $data = Paket::latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'paket.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {

        $paketID = $request->id;
        $data = Paket::updateOrCreate(
                    ['id' => $paketID],
                    ['nama' => $request->nama, 'harga' => $request->harga,]);    

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = Paket::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = Paket::where('id',$request->id)->delete();

        return Response()->json($data);
    }
}