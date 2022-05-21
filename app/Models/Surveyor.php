<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Surveyor extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'surveyor';
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'id_user', 'foto', 'tlf', 'jabatan', 'alamat', 'id_provinsi', 'id_kota', 'id_kecamatan', 'id_kelurahan'
    ];
}