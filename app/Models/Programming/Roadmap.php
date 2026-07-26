<?php

namespace App\Models\Programming;

use App\Models\Published\Status;
use App\Traits\Models\HasCacheVersion;
use App\Traits\Models\HasSearchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    use HasCacheVersion;
    use HasFactory, HasSearchable;

    protected $table = 'roadmaps';

    protected $fillable = [
        'status_id',
        'path_id',
        'sr',
        'name',
        'slug',
        'description',
        'image',
    ];

    protected $sFields = [
        'name',
    ];

    protected $sRelations = [
        'path' => 'name',
        'status' => 'name',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function path()
    {
        return $this->belongsTo(Path::class);
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }
}
