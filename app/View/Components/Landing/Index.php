<?php

namespace App\View\Components\Landing;

use App\Dynamic\Landing\Landing;
use App\Dynamic\Updates;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class Index extends Component
{
    public Landing $landing;
    public mixed $updates;
    public function __construct()
    {
        $this->landing = Landing::create();
        $this->landing->locale = App::getLocale();
        $this->updates = new Updates();
        $this->updates->load();
        $this->updates->generate_changes();
    }
    public function render()
    {
        return view('components.landing.index', [
            'landing' => $this->landing,
            'updates' => $this->updates,
        ]);
    }
}
