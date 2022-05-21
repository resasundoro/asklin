<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Rumah_sakit extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'rumah_sakit';
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'id_klinik', 'rs', 'alamat', 'id_provinsi', 'id_kota', 'tlf', 'jarak'
    ];
}