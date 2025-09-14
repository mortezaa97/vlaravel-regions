<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $guarded = [
        'id',
    ];

    public function counties(): HasMany
    {
        return $this->hasMany(County::class);
    }
}
