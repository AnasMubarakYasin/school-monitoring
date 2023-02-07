<?php

use App\Dynamic\Panel\Administrator as PanelAdministrator;
use App\Dynamic\Panel\Employee as PanelEmployee;
use App\Models\Administrator;
use App\Models\Employee;
use App\Models\Student;

return [
    'application' => [
        'name' => env('APP_NAME', 'Bladerlaiga'),
        'version' => env('APP_VERSION', '0.1.0'),
        'logo' => env('APP_LOGO', '/logo.png'),
        'favicon' => env('APP_LOGO', '/favicon.ico'),
        'vendor_name' => 'Bladerlaiga',
        'vendor_version' => '0.4.3',
        'vendor_year' => '2023',
        'vendor_logo' => '/logo.png',
    ],
    'panel' => [
        Administrator::class => PanelAdministrator::class,
        Employee::class => PanelEmployee::class,
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
        ]
    ],
];
