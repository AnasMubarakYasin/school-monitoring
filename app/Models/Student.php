<?php

namespace App\Models;

use App\Dynamic\Resource\Definition;
use App\Dynamic\Trait\Formable;
use App\Dynamic\Trait\Statable;
use App\Dynamic\Trait\Tableable;
use Error;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use NotificationChannels\WebPush\HasPushSubscriptions;

class Student extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;
    use Tableable, Formable, Statable;
    use HasPushSubscriptions;

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
                type: 'file:image',
            ),
            'name' => new Definition(
                name: 'name',
                type: 'string',
                // type: 'file:image',
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
            'major' => new Definition(
                name: 'major',
                type: 'model',
                array: false,
                relation: 'parent',
                alias: 'major_id',
            ),
            'classroom' => new Definition(
                name: 'classroom',
                type: 'model',
                array: false,
                relation: 'parent',
                alias: 'classroom_id',
            ),
        ];
        self::$fetcher_relation = function ($definition) {
            return match ($definition->name) {
                'major' => Major::all(),
                'classroom' => Classroom::all(),
                default => throw new Error("unknown name of $definition->name")
            };
        };
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

        'major_id',
        'classroom_id',
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

    public function setPhotoAttribute($value)
    {
        if (is_null($value)) {
            $this->attributes['photo'] = null;
        } else if (is_string($value)) {
            $this->attributes['photo'] = $value;
        } else {
            if (isset($this->attributes['photo'])) {
                Storage::delete($this->attributes['photo']);
            }
            $path = $this->id ? "$this->id" : 'temp';
            $this->attributes['photo'] = Storage::put("administrator/$path", $value);
        }
    }

    public function getPhotoUrlAttribute()
    {
        if (Str::of($this->photo)->startsWith('http')) {
            return $this->photo;
        } else {
            return Storage::url($this->photo);
        }
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function material_and_assignments()
    {
        return $this->hasMany(MaterialAndAssignment::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function visits()
    {
        return visits($this);
    }
}
