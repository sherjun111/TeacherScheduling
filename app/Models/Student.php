<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'studentid',
        'name',
        'username',
        'email',
        'password',
        'address',
        'year',
        'course',
        'age',
        'birthday',
        'phone',
        'email_verified_at',
        'verified'.
        'status',
        'picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ]; 
    public function getPictureAttribute($value){
        if( $value ){
            return asset('/images/users/students/'.$value);
        }else{
            return asset('/images/users/default-avatar.png');
        }
    }//end method
    public function selectedSubjects()
{
    return $this->hasMany(SelectedSubject::class);
}
}
