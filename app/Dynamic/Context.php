<?php

namespace App\Panel;

use App\Panel\Account\Context as AccountContext;
use App\Panel\Contracts\Accountable;

class Context
{
    public static function create(?string $class = null)
    {
        if (!$class) {
            return null;
        }

        $construct = config('panel.context')[$class];

        if (!$construct) {
            return null;
        }

        $context = new $construct();
        // $context->app_name = config('panel.application.name');
        // $context->app_version = config('panel.application.version');
        // $context->app_logo = config('panel.application.logo');
        // // $context->app_favicon = config('panel.application.favicon');

        // $context->vendor_name = config('panel.application.vendor_name');
        // $context->vendor_version = config('panel.application.vendor_version');
        // $context->vendor_year = config('panel.application.vendor_year');

        // $context->account = AccountContext::create($user);

        return $context;
    }


    public string $app_name = "";
    public string $app_version = "";

    public string $vendor_name = "";
    public string $vendor_version = "";
    public string $vendor_year = "";

    public string $app_logo = "";
    // public string $app_favicon = "";
    public string $app_webmanifest = "";

    public ?AccountContext $account =  null;


    public function __construct()
    {
    }

    public function route(string $name)
    {
        return "";
    }
    public function get_menus(): array
    {
        return [];
    }
}
