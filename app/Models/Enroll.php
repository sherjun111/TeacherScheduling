<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Enroll extends Model
{
    protected $guard = 'student';
    use HasFactory;
    protected $fillable = [
        'studentid',
        'subject_id',
        'subject_code',
        'subject_name',
        'subject_time',
        'subject_room',
        'subject_block',
        'subject_day',
        'year_level',
        
    ];
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
