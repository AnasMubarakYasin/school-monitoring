<?php

namespace App\View\Components\Entry;

use App\Dynamic\Landing\Landing;
use Illuminate\View\Component;

class Signin extends Component
{
    public array $data = [
        'name' => '',
        'password' => '',
    ];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $for = '')
    {
        $demo = request()->query->getBoolean('demo') && config('dynamic.entry.enable_demo', false);
        if ($demo && $for) {
            $landing = Landing::create();
            $account = $landing->get_users()[$for];
            if (isset($account['user'])) {
                $this->data = $account['user'];
            } else {
                $this->data = collect($account['users'])->sole("role", request()->query('role'));
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.entry.signin', [
            'data' => $this->data,
        ]);
    }
}
