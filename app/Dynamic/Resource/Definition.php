<?php

namespace App\Dynamic\Resource;

class Definition
{
    public function __construct(
        public string $name,
        public string $type,
        public string|null $format = null,
        public bool $array = false,
        // public bool $hide_create = false,
        // public bool $hide_view = false,
        // public bool $hide_update = false,

        public mixed $default = null,
        public mixed $enums = null,
        public bool $multiple = false,
        public string|null $accept = null,
        public string|null $relation = null,
        public string|null $alias = null,
        public array|null $children = null,
    ) {
    }
}
