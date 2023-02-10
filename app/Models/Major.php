<?php

namespace App\Models;

use App\Dynamic\Resource\Definition;
use App\Dynamic\Trait\Formable;
use App\Dynamic\Trait\Statable;
use App\Dynamic\Trait\Tableable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    use Tableable, Formable, Statable;

    public static function modelable(): Model
    {
        return new Major();
    }
    public static function defining()
    {
        self::$caption = "major";
        self::$definitions = [
            'name' => new Definition(
                name: 'name',
                type: 'string',
            ),
            'code' => new Definition(
                name: 'code',
                type: 'string',
            ),
            'expertise' => new Definition(
                name: 'expertise',
                type: 'enum',
                enums: [
                    'kimia' => 'kimia',
                    'biology' => 'biology',
                    'language' => 'language',
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

    protected $fillable = [
        'name',
        'code',
        'expertise',
        'general_competence',
        'special_competence',
    ];
}
