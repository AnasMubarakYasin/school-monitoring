<?php

namespace App\Models;

enum UserType: string
{
    case Administrator = "administrator";
    case Employee = "employee";

    public function to_string(): string
    {
        return match ($this) {
            UserType::Administrator => 'Administrator',
            UserType::Employee => 'employee',
        };
    }
    public static function to_array(): array
    {
        return [
            'administrator' => UserType::Administrator->to_string(),
            'employee' => UserType::Employee->to_string(),
        ];
    }
}
