<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
  
class Klinik extends Model
{
    use HasFactory;
    use Userstamps;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'no_anggota',
        'logo_klinik',
        'nama_klinik',
        'no_ijin_klinik',
        'tgl_terbit_ijin_klinik',
        'masa_berlaku_ijin_klinik',
        'nama_pendaftar',
        'email_pendaftar',
        'tlf_pendaftar',
        'status_pendaftar',
        'nama_pemilik',
        'jenis_klinik',
        'status_kepemilikan_klinik',
        'tlf_klinik',
        'alamat_klinik',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos',
        'bentuk_badan_hukum',
        'bentuk_badan_usaha',
        'nama_badan',
        'kriteria',
        'fasilitas',
        'layanan',
        'status'
    ];
}