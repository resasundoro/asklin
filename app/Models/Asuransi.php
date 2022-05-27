<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Asuransi extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'asuransi';
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'id_klinik', 'asuransi', 'alamat', 'kontak', 'tlf', 'kerjasama'
    ];
}