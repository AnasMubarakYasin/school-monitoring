<?php

namespace App\Models;

use App\Models\Resource\Definition;
use App\Models\Resource\Trait\Formable;
use App\Models\Resource\Trait\Statable;
use App\Models\Resource\Trait\Tableable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;
    use Tableable, Formable, Statable;

    public static function modelable(): Model
    {
        return new Student();
    }
    public static function defining()
    {
        self::$caption = "student";
        self::$definitions = [
            'photo' => new Definition(
                name: 'photo',
                type: 'string',
            ),
            'name' => new Definition(
                name: 'name',
                type: 'string',
            ),
            'photo' => new Definition(
                name: 'photo',
                type: 'string',
            ),
            'email' => new Definition(
                name: 'email',
                type: 'string',
            ),
            'telp' => new Definition(
                name: 'telp',
                type: 'string',
            ),
            'password' => new Definition(
                name: 'password',
                type: 'string',
            ),

            'nis' => new Definition(
                name: 'nis',
                type: 'string',
            ),
            'nisn' => new Definition(
                name: 'nisn',
                type: 'string',
            ),
            'fullname' => new Definition(
                name: 'fullname',
                type: 'string',
            ),
            'gender' => new Definition(
                name: 'gender',
                type: 'enum',
                enums: [
                    'male' => 'male',
                    'female' => 'female',
                ],
            ),
            'grade' => new Definition(
                name: 'grade',
                type: 'string',
            ),
        ];
    }

    protected $fillable = [
        'photo',
        'name',
        'telp',
        'email',
        'password',

        'nis',
        'nisn',
        'fullname',
        'gender',
        'grade',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
