<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'subject_code',
        'subject_name',
        'subject_time',
        'subject_room',
        'subject_block',
        'subject_day',
        'year_level',
        'category_slug',
        'category_image',
        'ordering'
        
    ];
    public function sluggable(): array
    {
        return [
            'category_slug' => [
                'source' => 'subject_name'
            ]
        ];
    }
    public function selectedBy()
{
    return $this->hasMany(SelectedSubject::class);
}
}
