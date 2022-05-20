<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
  
class Karyawan extends Model
{
    use HasFactory;
    use Userstamps;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'id_klinik', 'nama', 'id_kategori', 'npa_idi', 'no_str', 'tgl_akhir_sip', 'no_tlf', 'no_sib_sik', 'tgl_akhir_str', 'ket_sib_sik', 'farmasi_apoteker', 'ijazah_terakhir', 'jabatan'
    ];
}