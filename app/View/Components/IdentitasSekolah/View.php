<?php

namespace App\View\Components\IdentitasSekolah;

use App\Models\SchoolInformation;
use Illuminate\View\Component;

class View extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
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
        $resource = SchoolInformation::all()->firstOrFail();
        $data = [
            'resource' => $resource
        ];
        return view('components.identitas-sekolah.view', $data);
    }
}
