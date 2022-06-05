<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Artikel extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'artikel';

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'id', 'id_kategori', 'id_tags', 'cover', 'title', 'slug', 'desc', 'keywords', 'meta_desc'
    ];
}
