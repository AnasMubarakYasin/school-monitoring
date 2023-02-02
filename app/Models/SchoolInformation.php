<?php

namespace App\Models;

use App\Models\Resource\Definition;
use App\Models\Resource\Trait\Formable;
use App\Models\Resource\Trait\Tableable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolInformation extends Model
{
    use HasFactory;
    use Tableable, Formable;

    public static function defining()
    {
        self::$definitions['name'] = new Definition(
            name: 'school name',
            type: 'string',
        );
        self::$definitions['npsn'] = new Definition(
            name: 'npsn',
            type: 'string',
        );
        self::$definitions['nss'] = new Definition(
            name: 'nss',
            type: 'string',
        );
        self::$definitions['status'] = new Definition(
            name: 'status',
            type: 'enum',
            enums: [
                'Negeri' => 'Negeri',
                'Swasta' => 'Swasta',
                'Madrasah' => 'Madrasah',
                'Homeschooling' => 'Homeschooling'
            ],
        );
        self::$definitions['address'] = new Definition(
            name: 'address',
            type: 'string',
        );
        self::$definitions['village'] = new Definition(
            name: 'village',
            type: 'string',
        );
        self::$definitions['sub_district'] = new Definition(
            name: 'sub district',
            type: 'string',
        );
        self::$definitions['district'] = new Definition(
            name: 'district',
            type: 'string',
        );
        self::$definitions['province'] = new Definition(
            name: 'province',
            type: 'string',
        );
        self::$definitions['postal_code'] = new Definition(
            name: 'postal code',
            type: 'string',
        );
        self::$definitions['telp'] = new Definition(
            name: 'telp',
            type: 'string',
        );
        self::$definitions['website'] = new Definition(
            name: 'website',
            type: 'string',
        );
    }
    public static function modelable(): Model
    {
        return new SchoolInformation();
    }

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
    protected $hidden = [];
}
