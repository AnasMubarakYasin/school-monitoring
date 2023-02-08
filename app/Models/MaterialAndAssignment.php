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
            relation: 'teacher',
            alias: 'teacher_id',
        );
        self::$definitions['type'] = new Definition(
            name: 'type',
            type: 'enum',
            enums: [
                'Bahan Ajar' => 'Bahan Ajar',
            ],
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
    }
    public static function modelable(): Model
    {
        return new MaterialAndAssignment();
    }

    protected $fillable = [
        'subjects_id',
        'class_id',
        'teacher_id',
        'type',
        'start_at',
        'end_at',
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
}
