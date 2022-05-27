<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Ruang_klinik extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'ruang_klinik';
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'id_klinik', 'id_ruang_klinik', 'foto'
    ];
}