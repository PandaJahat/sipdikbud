<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
        "user_id",
        "image_file",
        "thumbnail_file",
        "is_active"
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
