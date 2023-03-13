<?php

namespace App\Dynamic\Landing;

use App\Models\Administrator;
use App\Models\Employee;

class Landing
{
    /** @return Landing|null */
    public static function create()
    {
        $landing = new Landing();
        $landing->vendor_name = config('dynamic.application.vendor_name');
        $landing->vendor_year = config('dynamic.application.vendor_year');
        $landing->vendor_version = config('dynamic.application.vendor_version');
        $landing->vendor_logo = config('dynamic.application.vendor_logo');
        return $landing;
    }
    public string $vendor_name = '';
    public string $vendor_year = '';
    public string $vendor_version = '';
    public string $vendor_logo = '';

    public string $locale = '';

    public function get_users()
    {
        return [
            'administrator' => [
                'name' => 'Administrator',
                'login' => route('web.administrator.login_perform'),
                'user' => [
                    'name' => 'admin',
                    'password' => 'admin',
                ],
                'demo' => true,
            ],
            'employee' => [
                'name' => 'Employee',
                'login' => route('web.employee.login_perform'),
                'users' => [
                    [
                        'role' => 'staff',
                        'name' => 'staff',
                        'password' => 'staff',
                    ],
                    [
                        'role' => 'teacher',
                        'name' => 'kimia_teacher',
                        'password' => 'kimia_teacher',
                    ],
                ],
                'demo' => true,
            ],
            'student' => [
                'name' => 'Student',
                'login' => route('web.student.login_perform'),
                'user' => [
                    'name' => '10_a_1',
                    'password' => '10_a_1',
                ],
                'demo' => true,
            ],
        ];
    }
}
