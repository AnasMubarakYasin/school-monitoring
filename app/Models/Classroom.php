<?php

namespace App\Models;

use App\Models\Resource\Definition;
use App\Models\Resource\Trait\Formable;
use App\Models\Resource\Trait\Tableable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    use Tableable, Formable;

    public static function defining()
    {
        self::$definitions = [
            'code' => new Definition(
                name: 'code',
                type: 'string',
            ),
            'name' => new Definition(
                name: 'name',
                type: 'string',
            ),
            'total_student' => new Definition(
                name: 'total student',
                type: 'string',
            ),
            'description' => new Definition(
                name: 'description',
                type: 'string',
            ),
            'major' => new Definition(
                name: 'major',
                type: 'model',
                array: false,
                relation: 'parent',
                alias: 'major_id',
            ),
            'homeroom' => new Definition(
                name: 'homeroom',
                type: 'model',
                array: false,
                relation: 'parent',
                alias: 'homeroom_id',
            ),
        ];
    }
    public static function modelable(): Model
    {
        return new Classroom();
    }

    protected $fillable = [
        'code',
        'name',
        'total_student',
        'description',

        'major_id',
        'homeroom_id',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
    public function homeroom()
    {
        return $this->belongsTo(Employee::class, 'homeroom_id');
    }
}