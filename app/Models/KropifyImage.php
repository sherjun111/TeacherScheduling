<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KropifyImage extends Model
{
    protected $fillable = [
        'user_id',
        'user_type',
        'filename',
        'original_name',
        'mime_type',
        'size',
        'path',
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}