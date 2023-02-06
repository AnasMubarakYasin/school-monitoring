<?php

namespace App\Dynamic;

class Menu
{
    public function __construct(
        public string $name = "",
        public string $link = "",
        public string $icon = "",
        public array $submenu = [],
        public string $pname = "",
        public string $pclass = "",
    ) {
    }
}
