<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;

    protected $table = 'collection_languages';
    protected $fillable = [
        "code",
        "name",
    ];

    public function collections()
    {
        return $this->hasMany('App\Models\Collection\Collection', 'language_id', 'id');
    }
}
