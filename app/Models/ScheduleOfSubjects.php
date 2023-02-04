<?php

namespace App\Models;

use App\Models\Resource\Definition;
use App\Models\Resource\Trait\Formable;
use App\Models\Resource\Trait\Statable;
use App\Models\Resource\Trait\Tableable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ScheduleOfSubjects extends Model
{
    use HasFactory;
    use Tableable, Formable, Statable;

    public static function defining()
    {
        self::$caption = "schedule of subjects";
        self::$definitions['subjects'] = new Definition(
            name: 'subjects',
            type: 'model',
            array: false,
            relation: 'parent',
            alias: 'subjects_id',
        );
        self::$definitions['classrooms'] = new Definition(
            name: 'classrooms',
            type: 'model',
            array: false,
            relation: 'parent',
            alias: 'class_id',
        );
        self::$definitions['teacher'] = new Definition(
            name: 'teacher',
            type: 'model',
            array: false,
            relation: 'parent',
            alias: 'teacher_id',
        );
        self::$definitions['start_time'] = new Definition(
            name: 'start time',
            type: 'time',
        );
        self::$definitions['end_time'] = new Definition(
            name: 'end time',
            type: 'time',
        );
        self::$definitions['time'] = new Definition(
            name: 'time',
            type: 'string',
        );
        self::$definitions['day'] = new Definition(
            name: 'day',
            type: 'enum',
            enums: [
                'senin' => 'senin', 'selasa' => 'selasa', 'rabu' => 'rabu', 'kamis' => 'kamis', 'jumat' => 'jumat', 'sabtu' => 'sabtu', 'minggu' => 'minggu'
            ]
        );
        self::$definitions['description'] = new Definition(
            name: 'description',
            type: 'string',
        );
    }
    public static function modelable(): Model
    {
        return new ScheduleOfSubjects();
    }

    protected $fillable = [
        'subjects_id',
        'class_id',
        'teacher_id',
        'start_time',
        'end_time',
        'start_at',
        'end_at',
        'day',
        'description',
    ];

    protected $casts = [];
    protected $hidden = [];

    public function subjects()
    {
        return $this->belongsTo(Subjects::class, 'subjects_id');
    }
    public function classrooms()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Employee::class, 'teacher_id');
    }

    public function getStartTimeAttribute()
    {
        if ($this->id) {
            return Carbon::parse($this->attributes['start_at'])->format('h:m');
        } else {
            return "";
        }
    }
    public function getEndTimeAttribute()
    {
        if ($this->id) {
            return Carbon::parse($this->attributes['end_at'])->format('h:m');
        } else {
            return "";
        }
    }

    public function getTimeAttribute()
    {
        return $this->attributes['start_at'] . ' - ' . $this->attributes['end_at'];
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_at'] = $value;
    }
    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_at'] = $value;
    }
}
