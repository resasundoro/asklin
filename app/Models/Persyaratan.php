<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Persyaratan extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'persyaratan';
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'id_klinik', 'id_persyaratan', 'dokumen', 'status', 'keterangan'
    ];
}