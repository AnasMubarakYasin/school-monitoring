<?php

namespace App\View\Components\Landing;

use App\Dynamic\Landing\Landing;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class Index extends Component
{
    public Landing $landing;
    public function __construct()
    {
        $this->landing = Landing::create();
        $this->landing->locale = App::getLocale();
    }
    public function render()
    {
        return view('components.landing.index', [
            'landing' => $this->landing,
        ]);
    }
}
