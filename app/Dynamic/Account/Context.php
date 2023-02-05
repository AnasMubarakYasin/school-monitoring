<?php

namespace App\Panel\Account;

class Context
{
    public static function create(?string $name)
    {
        if (!$name) return null;
        $account = config('panel.account.list')[$name];
        $ctx = new Context();
        $ctx->name = $account['name'];
        $ctx->index = $account['index'];
        $ctx->name = $account['name'];
        $ctx->dashboard = $account['dashboard'];
        $ctx->favicon = $account['favicon'];
        return $ctx;
    }
    public string $name = "";
    public string $index = "";
    public string $dashboard = "";
    public string $webmanifest = "";
    public string $favicon = "";
    public function __construct()
    {
    }
}
