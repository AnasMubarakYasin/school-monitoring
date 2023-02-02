<?php

namespace App\Models;

use App\Models\Resource\Definition;
use App\Models\Resource\Trait\Formable;
use App\Models\Resource\Trait\Tableable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityAndInfrastructure extends Model
{
    use HasFactory;
    use Tableable, Formable;

    public static function defining()
    {
        self::$definitions['name'] = new Definition(
            name: 'facilities and infrastructure',
            type: 'string',
        );
        self::$definitions['amount'] = new Definition(
            name: 'amount',
            type: 'string',
        );
        self::$definitions['condition'] = new Definition(
            name: 'condition',
            type: 'enum',
            enums: [
                'Baik' => 'Baik',
                'Sedang' => 'Sedang',
                'Tidak Baik' => 'Tidak Baik'
            ],
        );
        self::$definitions['sarana_prasarana'] = new Definition(
            name: 'types',
            type: 'string',
        );
        self::$definitions['responsible_person'] = new Definition(
            name: 'responsible person',
            type: 'string',
        );
        self::$definitions['description'] = new Definition(
            name: 'description',
            type: 'string',
        );
    }
    public static function modelable(): Model
    {
        return new FacilityAndInfrastructure();
    }

    protected $fillable = [
        'name',
        'amount',
        'condition',
        'sarana_prasarana',
        'responsible_person',
        'description',
    ];

    protected $casts = [];
    protected $hidden = [];
}