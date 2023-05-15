<?php

namespace App\Dynamic;

use Error;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class Updates
{
    public string $name;
    public string $version;
    public string $last_version;
    public string $commit;
    public string $last_commit;
    public string $last_commit2;
    public string $changes;
    public string $vendor;
    public string $link;
    public string $date_inited;
    public string $date_updated;
    public function __construct()
    {
        $this->name = config('dynamic.application.name');
        $this->vendor = config('dynamic.application.vendor_name');
        $this->link = env('APP_URL');
    }
    public function generate_changes()
    {
        if ($this->commit == $this->last_commit) {
            $this->last_commit = $this->last_commit2;
        }
        $git_log = new Process(['git', 'log', '--pretty=- %s', "$this->commit...$this->last_commit"], "./");
        $git_log->run();
        $this->changes = trim($git_log->getOutput());
        return $this->changes;
    }
    public function load()
    {
        $git_rev = new Process(["git", "rev-parse", "--short", "HEAD"], "./");
        $git_rev->run();
        $this->commit = trim($git_rev->getOutput());
        $this->last_commit = Storage::disk('local')->get(".last_commit");
        if (!$this->last_commit) {
            throw new Error("last commit empty");
        }
        $this->last_commit2 = Storage::disk('local')->get(".last_commit2");
        if (!$this->last_commit2) {
            throw new Error("last commit 2 empty");
        }
        $this->version = config('dynamic.application.version');
        $this->last_version = Storage::disk('local')->get(".last_version");
        if (!$this->last_version) {
            throw new Error("last version empty");
        }
        $this->date_inited = Storage::disk('local')->get(".date_inited");
        $this->date_updated = Storage::disk('local')->get(".date_updated");
    }
    public function save()
    {
        $this->date_updated = now();
        Storage::disk('local')->put(".last_commit", "$this->commit");
        Storage::disk('local')->put(".last_version", "$this->version");
        Storage::disk('local')->put(".date_updated", "$this->date_updated");
    }
}
