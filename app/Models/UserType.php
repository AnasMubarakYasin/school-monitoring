<?php

namespace App\Models;

enum UserType
{
    case Administrator;

    public function to_string(): string
    {
        return match ($this) {
            UserType::Administrator => 'Administrator',
        };
    }
    public static function to_array(): array
    {
        return [
            'administrator' => UserType::Administrator->to_string(),
        ];
    }
}
