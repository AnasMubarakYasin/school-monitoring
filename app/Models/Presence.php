<?php

namespace App\Models;


use App\Dynamic\Resource\Definition;
use App\Dynamic\Trait\Formable;
use App\Dynamic\Trait\Statable;
use App\Dynamic\Trait\Tableable;
use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    use Tableable, Formable, Statable;

    public static function modelable(): Model
    {
        return new Presence();
    }
    public static function defining()
    {
        self::$caption = "presence";
        self::$definitions = [
            'name' => new Definition(
                name: 'name',
                type: 'string',
            ),
            'school_year' => new Definition(
                name: 'school year',
                type: 'model',
                array: false,
                relation: 'school_year',
                alias: 'school_year_id',
            ),
            'semester' => new Definition(
                name: 'semester',
                type: 'model',
                array: false,
                relation: 'semester',
                alias: 'semester_id',
            ),
            'teacher' => new Definition(
                name: 'teacher',
                type: 'model',
                array: false,
                relation: 'teacher',
                alias: 'teacher_id',
            ),
            'subjects' => new Definition(
                name: 'subjects',
                type: 'model',
                array: false,
                relation: 'subjects',
                alias: 'subjects_id',
            ),
            'classroom' => new Definition(
                name: 'classroom',
                type: 'model',
                array: false,
                relation: 'classroom',
                alias: 'classroom_id',
            ),
            'attendances' => new Definition(
                name: 'attendances',
                type: 'model',
                array: true,
                relation: 'attendances',
            ),
        ];

        self::$route_create = function () {
            return route('web.resource.presence.create');
        };
        self::$route_update = function ($item) {
            return route('web.resource.presence.update', ['presence' => $item]);
        };
        self::$route_delete = function ($item) {
            return route('web.resource.presence.delete', ['presence' => $item]);
        };
        self::$route_delete_any = function () {
            return route('web.resource.presence.delete_any');
        };
        self::$fetcher_relation = function ($definition) {
            return match ($definition->name) {
                'school year' => SchoolYear::all(),
                'semester' => Semester::all(),
                'teacher' => Employee::all(),
                'subjects' => Subjects::all(),
                'classroom' => Classroom::all(),
                default => throw new Error("unknown name of $definition->name")
            };
        };
    }

    static function generate()
    {
        $sy = SchoolYear::first_open();
        $sm = Semester::first_open();
        $sos = ScheduleOfSubjects::all();

        foreach ($sos as $key => $value) {
            $pr = new self([
                'name'=> "{$value->subjects()->sole()->id}_{$value->classrooms()->sole()->id}",
                'school_year_id' => $sy->id,
                'semester_id' => $sm->id,
                'teacher_id' => $value->teacher()->sole()->id,
                'subjects_id' => $value->subjects()->sole()->id,
                'classroom_id' => $value->classrooms()->sole()->id,
            ]);
            $pr->save();
            foreach ($value->classrooms()->sole()->students()->get() as $key => $value) {
                foreach (range(1, 16) as $_) {
                    $at = new Attendance([
                        // 'state',
                        // 'description',
                        'presence_id' => $pr->id,
                        'student_id' => $value->id,
                    ]);
                    $at->save();
                }
            }
        }
    }

    protected $fillable = [
        'name',

        'school_year_id',
        'semester_id',
        'teacher_id',
        'subjects_id',
        'classroom_id',
    ];
    protected $casts = [];
    protected $hidden = [];

    public function school_year()
    {
        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Employee::class, 'teacher_id');
    }
    public function subjects()
    {
        return $this->belongsTo(Subjects::class, 'subjects_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
