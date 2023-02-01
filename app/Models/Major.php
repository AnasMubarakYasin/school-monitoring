<?php

namespace App\Models;

use App\Models\Resource\Definition;
use App\Models\Resource\Trait\Formable;
use App\Models\Resource\Trait\Tableable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    use Tableable, Formable;

    public static function defining()
    {
        self::$definitions = [
            'name' => new Definition(
                name: 'name',
                type: 'string',
            ),
            'expertise' => new Definition(
                name: 'expertise',
                type: 'enum',
                enums: [
                    'kimia' => 'kimia',
                    'biology' => 'biology',
                ],
            ),
            'general_competence' => new Definition(
                name: 'general competence',
                type: 'string',
            ),
            'special_competence' => new Definition(
                name: 'special competence',
                type: 'string',
            ),
        ];
    }
    public static function modelable(): Model
    {
        return new Major();
    }

    protected $fillable = [
        'name',
        'expertise',
        'general_competence',
        'special_competence',
    ];
}
