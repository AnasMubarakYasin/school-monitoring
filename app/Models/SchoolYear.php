<?php

namespace App\Models;

use App\Models\Resource\Definition;
use App\Models\Resource\Trait\Formable;
use App\Models\Resource\Trait\Statable;
use App\Models\Resource\Trait\Tableable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;
    use Tableable, Formable, Statable;

    public static function modelable(): Model
    {
        return new SchoolYear();
    }
    public static function defining()
    {
        self::$caption = "school year";
        self::$definitions['name'] = new Definition(
            name: 'name',
            type: 'string',
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
        self::$definitions['semesters'] = new Definition(
            name: 'semesters',
            type: 'model',
            array: true,
            relation: 'children',
            alias: "",
        );
    }

    protected $fillable = [
        'name',
        'is_active',
        'state',
        'start_at',
        'end_at',
    ];

    protected $casts = [
        // 'is_active' => 'boolean',
    ];

    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }
}
