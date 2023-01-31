<?php

namespace App\Models;

use App\Models\Resource\Definition;
use App\Models\Resource\Trait\Formable;
use App\Models\Resource\Trait\Tableable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    use Tableable, Formable;

    public static function defining()
    {
        self::$definitions['name'] = new Definition(
            name: 'name',
            type: 'string',
        );
        self::$definitions['part'] = new Definition(
            name: 'part',
            type: 'enum',
            enums: [
                'odd' => 'odd',
                'even' => 'even',
            ],
        );
        self::$definitions['state'] = new Definition(
            name: 'state',
            type: 'enum',
            enums: [
                'planned' => 'planned',
                'ongoing' => 'ongoing',
                'finished' => 'finished',
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
        self::$definitions['school_year'] = new Definition(
            name: 'school year',
            type: 'model',
            array: false,
            relation: 'parent',
            alias: 'school_year_id',
        );
    }
    public static function modelable(): Model
    {
        return new Semester();
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
