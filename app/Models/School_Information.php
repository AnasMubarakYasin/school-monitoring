<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School_Information extends Model
{
    use HasFactory;

    public static $fields = [
        'name' => [
            'name' => 'school name',
            'type' => 'string',
        ],
        'npsn' => [
            'name' => 'npsn',
            'type' => 'string',
        ],
        'nss' => [
            'name' => 'nss',
            'type' => 'string',
        ],
        'status' => [
            'name' => 'status',
            'type' => 'enum',
            'enums' => [
                'Negeri' => 'Negeri',
                'Swasta' => 'Swasta',
                'Madrasah' => 'Madrasah',
                'Homeschooling' => 'Homeschooling'
            ]
        ],
        'address' => [
            'name' => 'address',
            'type' => 'string',
        ],
        'village' => [
            'name' => 'village',
            'type' => 'string',
        ],
        'sub_district' => [
            'name' => 'sub district',
            'type' => 'string',
        ],
        'district' => [
            'name' => 'district',
            'type' => 'string',
        ],
        'province' => [
            'name' => 'province',
            'type' => 'string',
        ],
        'postal_code' => [
            'name' => 'postal code',
            'type' => 'string',
        ],
        'telp' => [
            'name' => 'telp',
            'type' => 'string',
        ],
        'website' => [
            'name' => 'website',
            'type' => 'string',
        ]
    ];

    protected $fillable = [
        'name',
        'npsn',
        'nss',
        'status',
        'address',
        'village',
        'sub_district',
        'district',
        'province',
        'postal_code',
        'telp',
        'website',
    ];

    protected $casts = [];
}
