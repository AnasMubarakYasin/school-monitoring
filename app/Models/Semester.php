<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    public static $fields = [
        'name' => [
            'name' => 'name',
            'type' => 'string',
            'hide_create',
        ],
        'part' => [
            'name' => 'part',
            'type' => 'enum',
            'enums' => [
                'odd' => 'odd',
                'even' => 'even'
            ]
        ],
        'state' => [
            'name' => 'state',
            'type' => 'enum',
            'enums' => [
                'planned' => 'planned',
                'ongoing' => 'ongoing',
                'finished' => 'finished'
            ]
        ],
        'start_at' => [
            'name' => 'start at',
            'type' => 'date',
            'format' => 'Y-m-d',
            'format_js' => 'yyyy-mm-dd',
        ],
        'end_at' => [
            'name' => 'end at',
            'type' => 'date',
            'format' => 'Y-m-d',
            'format_js' => 'yyyy-mm-dd',
        ],
        'school_year' => [
            'name' => 'school year',
            'type' => 'model',
            'as' => 'school_year_id',
            'child',
        ],
    ];

    protected $fillable = [
        'name',
        'part',
        'state',
        'start_at',
        'end_at',
        'school_year_id',
    ];

    protected $casts = [];

    public function getComponentAttribute()
    {
        return 'semester.view';
    }

    public function school_year()
    {
        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }
}
