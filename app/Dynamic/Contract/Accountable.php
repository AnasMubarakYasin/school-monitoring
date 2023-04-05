<?php

namespace Dynamic\Contract;

interface Accountable
{
    public function get_photo(): string;
    public function get_name(): string;
    public function get_identifier(): string;
    public function get_description(): string;
    public function get_guard(): string;
}
