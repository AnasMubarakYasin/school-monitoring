<?php

namespace App\Console\Commands;

use App\Dynamic\Init;
use Illuminate\Console\Command;

class AppInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init Application';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $init = new Init();
        $init->create();

        $this->line("Init version $init->version");
        $this->line("Init commit $init->commit");

        return Command::SUCCESS;
    }
}
