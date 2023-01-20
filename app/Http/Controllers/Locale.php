<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Locale extends Controller
{
    public function set(string $locale)
    {
        session()->put('locale', $locale);

        return back();
    }
}
