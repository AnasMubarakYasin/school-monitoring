<?php

namespace App\View\Components\SchoolYear;

use Illuminate\View\Component;

class Stat extends Component
{
    public string $name = "2022/2023";
    public int $days = 360;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.school-year.stat', [
            'days' => $this->days,
            'name' => $this->name,
        ]);
    }
}
