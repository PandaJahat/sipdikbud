<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Source extends Model
{
    use SoftDeletes;

    protected $table = 'sources';
    protected $fillable = [
        "name",
        "description",
        "logo_file",
        "url",
        "code",
        "is_institute",
        "company_name",
        "type",
        "last_sync",
        "route",
        "thumbnail_path"
    ];

    public function collections()
    {
        return $this->hasMany('App\Models\Collection\Collection', 'source_id', 'id');
    }
}
