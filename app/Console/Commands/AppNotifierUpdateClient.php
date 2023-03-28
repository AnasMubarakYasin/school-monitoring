<?php

namespace App\Console\Commands;

use App\Mail\AppNotifierUpdateClient as MailAppNotifierUpdateClient;
use App\Models\AcademicActivity;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AppNotifierUpdateClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notify-update-client {email? : The email client want to notify}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Application Updates to Client';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        if (!$email) {
            $email = env('MAIL_CLIENT');
        }
        if (!$email) {
            $this->error("Mail Client Empty");
            return Command::INVALID;
        }
        $this->line("Notify Update to Client: $email");

        try {
            Mail::to('bladerlaiga.97@gmail.com')->send(new MailAppNotifierUpdateClient());
        } catch (\Throwable $th) {
            $this->error($th->getMessage());
            return Command::FAILURE;
        }
        $this->info("Notify Update to Client success");
        // Mail::to($email)->send(new MailAppNotifierUpdateClient());

        // $data = range(1, 10);
        // $bar = $this->output->createProgressBar(count($data));
        // $bar->start();
        // foreach ($data as $_) {
        //     sleep(1);
        //     $bar->advance();
        // }
        // $bar->finish();
        // $this->line("\n");

        return Command::SUCCESS;
    }
}
