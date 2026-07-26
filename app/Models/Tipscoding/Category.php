<?php

namespace App\Models\Tipscoding;

use App\Traits\Models\HasCacheVersion;
use App\Traits\Models\HasSearchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasCacheVersion;
    use HasFactory, HasSearchable;

    protected $table = 'categories';

    protected $fillable = [
        'sc',
        'name',
        'slug',
        'image',
    ];

    protected $sFields = [
        'name',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tipscodings()
    {
        return $this->hasMany(Tipscoding::class);
    }
}
