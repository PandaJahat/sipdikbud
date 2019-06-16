<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Download_log extends Model
{
    use SoftDeletes;
    
    protected $table = 'collection_download_logs';
    protected $fillable = [
        "collection_id",
        "category"
    ];

    public function collection()
    {
        return $this->belongsTo('App\Models\Collection\Collection', 'collection_id', 'id');
    }
}
