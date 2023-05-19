<?php

use App\Dynamic\Panel\Administrator as PanelAdministrator;
use App\Dynamic\Panel\Employee as PanelEmployee;
use App\Dynamic\Panel\Student as PanelStudent;
use App\Dynamic\Panel\StudentParent as PanelStudentParent;
use App\Models\Administrator;
use App\Models\Employee;
use App\Models\Student;
use App\Models\StudentParent;

return [
    'application' => [
        'name' => env('APP_NAME', 'Bladerlaiga'),
        'version' => env('APP_VER', '0.3.5'),
        'logo' => env('APP_LOGO', '/logo.png'),
        'favicon' => env('APP_FAV', '/favicon.ico'),
        'vendor_name' => 'Bladerlaiga',
        'vendor_version' => '0.5.12',
        'vendor_year' => '2023',
        'vendor_logo' => '/logo.png',
        'commit' => '99af12f',
    ],
    'stakeholder' => [
        'dev' => ['wm337708@gmail.com'],
        'client' => ['unknownkillerreaper@gmail.com'],
    ],
    'panel' => [
        Administrator::class => PanelAdministrator::class,
        Employee::class => PanelEmployee::class,
        Student::class => PanelStudent::class,
        StudentParent::class => PanelStudentParent::class,
    ],
    'entry' => [
        'enable_demo' => true,
    ],
    'account' => [
        'list' => [
            Administrator::class => [
                'name' => 'administrator',
                'index' =>  '',
                'dashboard' =>  '',
                'webmanifest' => '',
                'logo' => '',
                'favicon' => '',
                'route' => [],
            ],
            Employee::class => [
                'name' => 'employee',
                'index' =>  '',
                'dashboard' =>  '',
                'webmanifest' => '',
                'logo' => '',
                'favicon' => '',
                'route' => [],
            ],
            Student::class => [
                'name' => 'student',
                'index' =>  '',
                'dashboard' =>  '',
                'webmanifest' => '',
                'logo' => '',
                'favicon' => '',
                'route' => [],
            ],
            StudentParent::class => [
                'name' => 'student_parent',
                'index' =>  '',
                'dashboard' =>  '',
                'webmanifest' => '',
                'logo' => '',
                'favicon' => '',
                'route' => [],
            ],
        ]
    ],
];
