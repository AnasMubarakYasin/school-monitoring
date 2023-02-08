<?php

namespace App\Models;


use App\Dynamic\Resource\Definition;
use App\Dynamic\Trait\Formable;
use App\Dynamic\Trait\Statable;
use App\Dynamic\Trait\Tableable;
use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    use Tableable, Formable, Statable;

    public static function modelable(): Model
    {
        return new Attendance();
    }
    public static function defining()
    {
        self::$caption = "attendance";
        self::$definitions = [
            'state' => new Definition(
                name: 'state',
                type: 'enum',
                enums: [
                    'present' => 'present',
                    'unpresent' => 'unpresent',
                ],
            ),
            'description' => new Definition(
                name: 'description',
                type: 'string',
            ),
            'presence' => new Definition(
                name: 'presence',
                type: 'model',
                array: false,
                relation: 'presence',
                alias: 'presence_id',
            ),
            'student' => new Definition(
                name: 'student',
                type: 'model',
                array: false,
                relation: 'student',
                alias: 'student_id',
            ),
        ];
        
        self::$route_create = function () {
            return route('web.resource.attendance.create');
        };
        self::$route_update = function ($item) {
            return route('web.resource.attendance.update', ['attendance' => $item]);
        };
        self::$route_delete = function ($item) {
            return route('web.resource.attendance.delete', ['attendance' => $item]);
        };
        self::$route_delete_any = function () {
            return route('web.resource.attendance.delete_any');
        };
        self::$fetcher_relation = function ($definition) {
            return match ($definition->name) {
                'presence' => Presence::all(),
                'student' => Student::all(),
                default => throw new Error("unknown name of $definition->name")
            };
        };
    }

    protected $fillable = [
        'state',
        'description',

        'presence_id',
        'student_id',
    ];
    protected $casts = [];
    protected $hidden = [];

    public function presence()
    {
        return $this->belongsTo(Presence::class, 'presence_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
