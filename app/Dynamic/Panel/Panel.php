<?php

namespace App\Dynamic\Panel;

use App\Dynamic\Menu;
use stdClass;

class Panel
{
    /** @return Panel|null */
    public static function create(?string $user = null)
    {
        if (!$user) return null;
        $class = config('dynamic.panel')[$user];
        $panel = new $class();
        $panel->app_name = config('dynamic.application.name');
        $panel->app_logo = config('dynamic.application.logo');
        $panel->vendor_name = config('dynamic.application.vendor_name');
        $panel->vendor_year = config('dynamic.application.vendor_year');
        return $panel;
    }
    public ?stdClass $user = null;
    public ?Menu $menu = null;
    public string $title = 'Panel';
    public string $locale = '';
    public string $app_panel = '';
    public string $app_logo = '';
    public string $vendor_name = '';
    public string $vendor_year = '';
    public string $token = '';
    public bool $webmanifest = false;
    public bool $service_worker = false;
    public function get_user_photo(): string
    {
        return "";
    }
    public function get_user_name(): string
    {
        return "";
    }
    public function get_user_identifier(): string
    {
        return "";
    }
    public function get_menus(): array
    {
        return [];
    }
    public function get_name(): string
    {
        return "";
    }
    public function get_logo(): string
    {
        return "";
    }
    public function get_favicon(): string
    {
        return "";
    }
    public function get_webmanifest(): string
    {
        return "";
    }
    public function get_service_worker(): string
    {
        return "";
    }

    public function profile()
    {
        return "";
    }
    public function notifications()
    {
        return "";
    }
    public function signout()
    {
        return "";
    }
}
