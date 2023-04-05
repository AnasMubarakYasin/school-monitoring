<?php

namespace App\Dynamic;

use Error;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class Init
{
    public string $version;
    public string $commit;
    public function create()
    {
        $this->version = config('dynamic.application.version');
        $this->commit = config('dynamic.application.commit');

        if (!$this->commit) {
            $git_rev = new Process(["git", "rev-parse", "--short", "HEAD"], "./");
            $git_rev->run();
            $this->commit = trim($git_rev->getOutput());
        }

        Storage::disk('local')->put(".last_commit", "$this->commit");
        Storage::disk('local')->put(".last_version", "$this->version");
    }
}
