<?php

namespace App\View\Components\Semester;

use App\Models\Semester;
use Illuminate\View\Component;

class View extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Semester $model)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.semester.view', ['model' => $this->model]);
    }
}
