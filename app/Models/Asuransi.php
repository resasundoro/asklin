<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Asuransi extends Model
{
    use HasFactory;
    use Userstamps;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'id_klinik', 'asuransi', 'alamat', 'id_provinsi', 'id_kota', 'kontak', 'tlf'
    ];
}