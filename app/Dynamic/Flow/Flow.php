<?php

namespace App\Dynamic\Flow;

class Flow
{
    public int $passes = 0;
    public int $minimum_requirement = 0;
    public int $maximum_requirement = 0;
    public array $requirements = [];
    public function requirement()
    {
        return [];
    }
    public function requiring()
    {
        $this->requirements = $this->requirement();
        $this->maximum_requirement = count($this->requirements);
        $first = false;
        foreach ($this->requirements as $key => $requirement) {
            if ($requirement['pass']) {
                $this->passes++;
                continue;
            } else if (!$first) {
                $first = true;
            }
            $requirement['pass'] = false;
        }
    }
    public function meet_minimum_requirement() {
        return $this->passes >= $this->minimum_requirement;
    }
    public function meet_maximum_requirement() {
        return $this->passes == $this->maximum_requirement;
    }
}
