<?php

namespace App\View\Components\SchoolYear;

use App\Models\SchoolYear;
use Illuminate\View\Component;

class View extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public SchoolYear $model)
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.school-year.view', [
            'school_year' => $this->model,
        ]);
    }
}
