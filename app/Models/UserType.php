<?php

namespace App\Models;

enum UserType: string
{
    case Administrator = "administrator";
    case Employee = "employee";
    case Student = "student";

    public static function get_class_of(string $key): string
    {
        return match ($key) {
            'administrator' => Administrator::class,
            'employee' => Employee::class,
            'student' => Student::class,
        };
    }
    public static function get_login_of(string $key): string
    {
        return match ($key) {
            'administrator' => route('web.administrator.login_show'),
            'employee' => route('web.teacher.login_show'),
            'student' => "",
        };
    }
    public function to_string(): string
    {
        return match ($this) {
            UserType::Administrator => 'Administrator',
            UserType::Employee => 'Employee',
            UserType::Student => 'Student',
        };
    }
    public static function to_array(): array
    {
        return [
            'administrator' => UserType::Administrator->to_string(),
            'employee' => UserType::Employee->to_string(),
            'student' => UserType::Student->to_string(),
        ];
    }
}
