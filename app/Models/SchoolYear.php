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
        // 'is_active' => [
        //     'name' => 'is active',
        //     'type' => 'boolean'
        // ],
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
            'type' => 'date'
        ],
        'end_at' => [
            'name' => 'end at',
            'type' => 'date'
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
