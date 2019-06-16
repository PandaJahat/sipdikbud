<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institution extends Model
{
    use SoftDeletes;

    protected $table = 'institutions';
    protected $fillable = [
        "name",
        "description",
        "logo_file",
    ];

    public function collections()
    {
        return $this->belongsToMany('App\Models\Collection\Collection', 'collection_institution', 'institution_id', 'collection_id');
    }
}
