<?php

namespace App\View\Components\Panel;

use App\Dynamic\Flow\Flow as FlowFlow;
use Illuminate\View\Component;

class Flow extends Component
{
    /** @var FlowFlow */
    public mixed $flow;
    public function __construct(
        mixed $flow
    ) {
        $this->flow = $flow;
        $this->flow->requiring();
    }

    public function render()
    {
        return view('components.panel.flow', [
            'requirements' => $this->flow->requirements,
        ]);
    }
}
