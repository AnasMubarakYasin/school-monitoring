<?php

namespace App\Models;

use App\Dynamic\Resource\Definition;
use App\Dynamic\Trait\Formable;
use App\Dynamic\Trait\Statable;
use App\Dynamic\Trait\Tableable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialAndAssignment extends Model
{
    use HasFactory;
    use Tableable, Formable, Statable;

    public static function defining()
    {
        self::$caption = "material and assignment";
        self::$definitions['subjects'] = new Definition(
            name: 'subjects',
            type: 'model',
            array: false,
            relation: 'parent',
            alias: 'subjects_id',
        );
        self::$definitions['classroom'] = new Definition(
            name: 'classroom',
            type: 'model',
            array: false,
            relation: 'classroom',
            alias: 'classroom_id',
        );
        self::$definitions['teacher'] = new Definition(
            name: 'teacher',
            type: 'model',
            array: false,
            relation: 'teacher',
            alias: 'teacher_id',
        );
        self::$definitions['type'] = new Definition(
            name: 'type',
            type: 'enum',
            enums: ['material' => 'material', 'assignment' => 'assignment'],
        );
        self::$definitions['start_at'] = new Definition(
            name: 'start at',
            type: 'date',
            format: 'Y-m-d',
        );
        self::$definitions['end_at'] = new Definition(
            name: 'end at',
            type: 'date',
            format: 'Y-m-d',
        );
        self::$definitions['description'] = new Definition(
            name: 'description',
            type: 'string',
        );
        self::$definitions['file'] = new Definition(
            name: 'file',
            type: 'file',
        );
        self::$definitions['answer'] = new Definition(
            name: 'answer',
            type: 'model',
            array: true,
            relation: 'answer',
        );
    }
    public static function modelable(): Model
    {
        return new MaterialAndAssignment();
    }

    protected $fillable = [
        'subjects_id',
        'classroom_id',
        'teacher_id',
        'type',
        'start_at',
        'end_at',
        'description',
        'file'
    ];

    protected $casts = [];
    protected $hidden = [];

    public function subjects()
    {
        return $this->belongsTo(Subjects::class, 'subjects_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Employee::class, 'teacher_id');
    }
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
    // public function material_and_assignment()
    // {
    //     return $this->answer()->get()->groupBy("maa_id")->map(fn ($val) => $val[0]->material_and_assignment);
    // }
    // public function attendances()
    // {
    //     return $this->hasMany(Attendance::class);
    // }
}
