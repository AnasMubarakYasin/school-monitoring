<?php

namespace App\Dynamic;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class Init
{
    public string $version;
    public string $commit;
    public string $date_inited;
    public function create()
    {
        $this->version = config('dynamic.application.version');
        $this->commit = config('dynamic.application.commit');
        $this->date_inited = now();

        if (!$this->commit) {
            $git_rev = new Process(["git", "rev-parse", "--short", "HEAD"], "./");
            $git_rev->run();
            $this->commit = trim($git_rev->getOutput());
        }

        Storage::disk('local')->put(".last_commit", "$this->commit");
        Storage::disk('local')->put(".last_version", "$this->version");
        Storage::disk('local')->put(".date_inited", "$this->date_inited");
        Storage::disk('local')->put(".date_updated", "$this->date_inited");
    }
}
