<?php

namespace App\Models;

use App\Dynamic\Resource\Definition;
use App\Dynamic\Trait\Formable;
use App\Dynamic\Trait\Statable;
use App\Dynamic\Trait\Tableable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    use Tableable, Formable, Statable;

    public static function modelable(): Model
    {
        return new Answer();
    }
    public static function defining()
    {
        self::$caption = "answer";
        self::$definitions = [
            'file' => new Definition(
                name: 'file',
                type: 'file',
            ),
            'material_and_assignment' => new Definition(
                name: 'material and assignment',
                type: 'model',
                array: false,
                relation: 'material_and_assignment',
                alias: 'material_and_assignment_id',
            ),
            'student' => new Definition(
                name: 'student',
                type: 'model',
                array: false,
                relation: 'student',
                alias: 'student_id',
            ),
            'status' => new Definition(
                name: 'status',
                type: 'enum',
                enums: [
                    'not checked yet' => 'not checked yet',
                    'have been checked' => 'have been checked',
                ],
            ),
            'description' => new Definition(
                name: 'description',
                type: 'string',
            )
        ];
    }

    protected $fillable = [
        'file',
        'material_and_assignment_id',
        'student_id',
        'status',
        'description'
    ];
    protected $casts = [];
    protected $hidden = [];

    public function material_and_assignment()
    {
        return $this->belongsTo(MaterialAndAssignment::class, 'material_and_assignment_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
