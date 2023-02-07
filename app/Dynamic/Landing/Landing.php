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
                'name' => 'Employee (teacher)',
                'login' => route('web.employee.login_perform'),
                'user' => [
                    'name' => 'teacher',
                    'password' => 'teacher',
                ],
                'demo' => true,
            ],
        ];
    }
}
