<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class County extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $guarded = [
        'id',
    ];

    protected $appends = [];

    protected $with = [];

    /*
    * Relations
    */
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
