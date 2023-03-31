<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class StorageClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Storage';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line("Clear Path " . storage_path('app/public'));
        try {
            foreach (Storage::allDirectories() as $dir) {
                $status = Storage::deleteDirectory($dir);
                $this->info("Path " . $dir . " " . ($status ? 'success' : 'fail'));
            }
        } catch (\Throwable $th) {
            $this->error($th->getMessage());
            return Command::FAILURE;
        }
        $this->info("Clear Storage Success");

        return Command::SUCCESS;
    }
}
