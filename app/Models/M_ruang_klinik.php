<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
  
class M_ruang_klinik extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'm_ruang_klinik';
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'ruang'
    ];
}