<?php

namespace App\Models;

use App\Dynamic\Resource\Definition;
use App\Dynamic\Trait\Formable;
use App\Dynamic\Trait\Statable;
use App\Dynamic\Trait\Tableable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;
    use Tableable, Formable, Statable;

    public static function modelable(): Model
    {
        return new Employee();
    }
    public static function defining()
    {
        self::$caption = "employee";
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

            'nip' => new Definition(
                name: 'nip',
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
            'state' => new Definition(
                name: 'state',
                type: 'enum',
                enums: [
                    'honor' => 'honor',
                    'pns' => 'pns',
                ],
            ),
            'task' => new Definition(
                name: 'task',
                type: 'string',
            )
        ];
    }

    protected $fillable = [
        'photo',
        'name',
        'telp',
        'email',
        'password',

        'nip',
        'fullname',
        'gender',
        'state',
        'task',
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

    public function visits()
    {
        return visits($this);
    }
}
