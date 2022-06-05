<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Tags_artikel extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'tags_artikel';

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'slug', 'keywords', 'meta_desc'
    ];
}
