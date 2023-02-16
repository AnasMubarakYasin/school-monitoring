<?php

namespace App\View\Components\Panel;

use App\Dynamic\Panel\Panel;
use App\Models\User;
use App\Panel\Menu;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Layout extends Component
{
    public ?Panel $panel = null;
    public mixed $user = null;
    public function __construct(string $title)
    {
        /** @var User */
        $this->user = Auth::user();
        $this->panel = Panel::create($this->user::class);
        $this->panel->title = $title;
        $this->panel->locale = App::getLocale();
        $this->panel->token = $this->user->createToken('generic')->plainTextToken;
    }
    public function render()
    {
        return view('components.panel.layout', [
            'panel' => $this->panel,
            'user' => $this->user,
            'locale' => App::getLocale(),
        ]);
    }
}
