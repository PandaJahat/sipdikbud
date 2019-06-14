<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Keyword extends Model
{
    use SoftDeletes;

    protected $table = 'collection_keywords';
    protected $fillable = [
        'collection_id',
        'keyword'
    ];
}
