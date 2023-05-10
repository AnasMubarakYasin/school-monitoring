<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class StudentParent extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;
    // use Tableable, Formable, Statable;
    // use HasPushSubscriptions;

    protected $fillable = [
        'photo',
        'name',
        // 'email',
        'password',

        'student_id',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
