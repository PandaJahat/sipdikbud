<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use SoftDeletes;

    protected $table = 'collections';
    protected $fillable = [
        "title",
        "published_by",
        "published_year",
        "description",
        "cover_file",
        "document_file",
        "user_id",
        "is_active",
        "author_id",
        "language_id",
    ];
}
