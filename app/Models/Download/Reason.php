<?php

namespace App\Models\Download;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reason extends Model
{
    use SoftDeletes;

    protected $table = 'download_reasons';
    protected $fillable = [
        "name",
        "order"
    ];

    public function downloads()
    {
        return $this->hasMany('App\Models\Download\Collection', 'reason_id', 'id');
    }
}
