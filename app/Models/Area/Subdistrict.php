<?php

namespace App\Models\Area;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subdistrict extends Model
{
    use SoftDeletes;

    protected $table = 'subdistricts';
    protected $fillable = [
        "district_id",
        "code",
        "name",
    ];

    public $incrementing = false;

    public function district()
    {
        return $this->belongsTo('App\Models\Area\District', 'district_id', 'id');
    }
}
