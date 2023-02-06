<?php

namespace App\Models;

use App\Dynamic\Resource\Definition;
use App\Dynamic\Trait\Formable;
use App\Dynamic\Trait\Statable;
use App\Dynamic\Trait\Tableable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    use Tableable, Formable, Statable;

    public static function modelable(): Model
    {
        return new Semester();
    }
    public static function defining()
    {
        self::$caption = "semester";
        self::$definitions = [
            'name' => new Definition(
                name: 'name',
                type: 'string',
            ),
            'part' => new Definition(
                name: 'part',
                type: 'enum',
                enums: [
                    'odd' => 'odd',
                    'even' => 'even',
                ],
            ),
            'state' => new Definition(
                name: 'state',
                type: 'enum',
                enums: [
                    'planned' => 'planned',
                    'ongoing' => 'ongoing',
                    'finished' => 'finished',
                ],
            ),
            'start_at' => new Definition(
                name: 'start at',
                type: 'date',
                format: 'Y-m-d',
            ),
            'end_at' => new Definition(
                name: 'end at',
                type: 'date',
                format: 'Y-m-d',
            ),
            'school_year' => new Definition(
                name: 'school year',
                type: 'model',
                array: false,
                relation: 'parent',
                alias: 'school_year_id',
            ),
        ];
    }

    protected $fillable = [
        'name',
        'part',
        'state',
        'start_at',
        'end_at',
        'school_year_id',
    ];

    protected $casts = [];
    protected $hidden = [];

    public function school_year()
    {
        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }
}
