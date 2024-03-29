<?php

namespace App\Models;

use App\Dynamic\Resource\Definition;
use App\Dynamic\Trait\Formable;
use App\Dynamic\Trait\Statable;
use App\Dynamic\Trait\Tableable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;
    use Tableable, Formable, Statable;

    public static function defining()
    {
        self::$caption = "subjects";
        self::$definitions['id'] = new Definition(
            name: 'id',
            type: 'number',
        );
        self::$definitions['code'] = new Definition(
            name: 'subjects code',
            type: 'string',
        );
        self::$definitions['name'] = new Definition(
            name: 'subject name',
            type: 'string',
        );
        self::$definitions['grade'] = new Definition(
            name: 'grade',
            type: 'number',
        );
        self::$definitions['major'] = new Definition(
            name: 'major',
            type: 'model',
            array: false,
            relation: 'parent',
            alias: 'major_id',
        );
        self::$definitions['teacher'] = new Definition(
            name: 'teacher',
            type: 'model',
            array: false,
            relation: 'parent',
            alias: 'teacher_id',
        );
        self::$definitions['description'] = new Definition(
            name: 'description',
            type: 'string',
        );
    }
    public static function modelable(): Model
    {
        return new Subjects();
    }

    protected $fillable = [
        'code',
        'name',
        'grade',
        'major_id',
        'teacher_id',
        'description',
    ];

    protected $casts = [];
    protected $hidden = [];

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Employee::class, 'teacher_id');
    }
}
