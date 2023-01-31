<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    public static $fields = [
        'name' => [
            'name' => 'name',
            'type' => 'string',
            'hide_create' => true,
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
        'semesters' => [
            'name' => 'semesters',
            'type' => 'models',
        ],
    ];

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

    public function getComponentAttribute()
    {
        return 'school-year.view';
    }
}
