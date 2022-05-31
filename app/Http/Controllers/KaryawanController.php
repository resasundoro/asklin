<?php
    
namespace App\Http\Controllers;
    
use App\Models\Karyawan;
use Illuminate\Http\Request;
    
class KaryawanController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:karyawan-list|karyawan-create|karyawan-edit|karyawan-delete', ['only' => ['index','show']]);
         $this->middleware('permission:karyawan-create', ['only' => ['create','store']]);
         $this->middleware('permission:karyawan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:karyawan-delete', ['only' => ['destroy']]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto_str' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'foto_sip' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'foto_ijazah' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($foto_str = $request->file('foto_str')) {
            $destinationPath = 'images/klinik/sdm/';
            $foto_STR = date('YmdHis') . "-" . uniqid() . "." . $foto_str->getClientOriginalExtension();
            $foto_str->move($destinationPath, $foto_STR);
        }else{
            $foto_STR = NULL;
        }

        if ($foto_sip = $request->file('foto_sip')) {
            $destinationPath = 'images/klinik/sdm/';
            $foto_SIP = date('YmdHis') . "-" . uniqid() . "." . $foto_sip->getClientOriginalExtension();
            $foto_sip->move($destinationPath, $foto_SIP);
        }else{
            $foto_SIP = NULL;
        }

        if ($foto_ijazah = $request->file('foto_ijazah')) {
            $destinationPath = 'images/klinik/sdm/';
            $foto_IJAZAH = date('YmdHis') . "-" . uniqid() . "." . $foto_ijazah->getClientOriginalExtension();
            $foto_ijazah->move($destinationPath, $foto_IJAZAH);
        }else{
            $foto_IJAZAH = NULL;
        }

        $ID = $request->id;
        $data = Karyawan::updateOrCreate(
            ['id' => $ID],
            [
                'id_klinik' => $request->id_klinik,
                'nama' => $request->nama,
                'id_kategori' => $request->id_kategori,
                'npa_idi' => $request->npa_idi,
                'no_str' => $request->no_str,
                'tgl_akhir_sip' => $request->tgl_akhir_sip,
                'no_tlf' => $request->no_tlf,
                'no_sip' => $request->no_sip,
                'no_sib_sik' => $request->no_sib_sik,
                'tgl_akhir_str' => $request->tgl_akhir_str,
                'ket_sib_sik' => $request->ket_sib_sik,
                'farmasi_apoteker' => $request->farmasi_apoteker,
                'ijazah_terakhir' => $request->ijazah_terakhir,
                'jabatan' => $request->jabatan,
                'foto_sip' => $foto_SIP,
                'foto_str' => $foto_STR,
                'foto_ijazah' => $foto_IJAZAH
            ]
        );

        return Response()->json($data);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $data  = Karyawan::where($where)->first();

        return Response()->json($data);
    }

    public function destroy(Request $request)
    {
        $file = Karyawan::find($request->id);

        if($file->foto_str || $file->foto_sip){
            unlink(public_path() .  '/images/klinik/sdm/' . $file->foto_str);
            unlink(public_path() .  '/images/klinik/sdm/' . $file->foto_sip);
        } elseif($file->foto_ijazah){
            unlink(public_path() .  '/images/klinik/sdm/' . $file->foto_ijazah);
        }

        $data = Karyawan::where('id',$file->id)->delete();

        return Response()->json($data);
    }
}