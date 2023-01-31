<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Employee extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;

    public static $fields = [
        'photo' => [
            'name' => 'photo',
            'type' => 'string',
        ],
        'name' => [
            'name' => 'name',
            'type' => 'string',
        ],
        'email' => [
            'name' => 'email',
            'type' => 'string',
        ],
        'telp' => [
            'name' => 'telp',
            'type' => 'string',
        ],
        'password' => [
            'name' => 'password',
            'type' => 'string',
        ],

        'nip' => [
            'name' => 'nip',
            'type' => 'string',
        ],
        'fullname' => [
            'name' => 'fullname',
            'type' => 'string',
        ],
        'gender' => [
            'name' => 'gender',
            'type' => 'string',
        ],
        'state' => [
            'name' => 'state',
            'type' => 'string',
        ],
        'task' => [
            'name' => 'task',
            'type' => 'string',
        ],
    ];

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
}
