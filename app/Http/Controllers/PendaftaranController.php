<?php
    
namespace App\Http\Controllers;
    
use App\Models\Klinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
    
class PendaftaranController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:product-create', ['only' => ['create','store']]);
        // $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function edit()
    {
        $p = Klinik::find(Auth::user()->id_klinik);
        return view('pendaftaran.edit',compact('p'));
    }

    public function update(Request $request, Klinik $pendaftaran)
    {
        $request->validate([
            'nama_klinik' => 'required',
        ]);
      
        $pendaftaran->update($request->all());
      
        return redirect()->route('pendaftaran.index')
                        ->with('success','Klinik updated successfully');
    }
}