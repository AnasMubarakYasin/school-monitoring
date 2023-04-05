<?php

namespace App\Console\Commands;

use App\Dynamic\Updates;
use App\Mail\AppUpdates as MailAppUpdates;
use App\Models\AcademicActivity;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class AppNotifyUpdates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notify-updates
                                {emails?* : The emails client want to notify}
                                {--unsend : don"t send notification}
                                {--changes : show changes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify Application Updates to Client';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $updates = new Updates("client");
        try {
            $updates->load();
        } catch (\Throwable $th) {
            $this->error($th->getMessage());
            return Command::FAILURE;
        }
        $updates->generate_changes();

        $this->option('changes') && $this->line("Changes\n$updates->changes");

        $emails = $this->argument('emails');

        if (!$emails) {
            $emails = config('dynamic.stakeholder.client');
        }
        if (!$emails) {
            $this->error("Mail Client Empty");
            return Command::INVALID;
        }
        $dev_emails = config('dynamic.stakeholder.dev');
        $this->line("Notify Updates to Client: " . join(", ", $emails));
        $this->line("Notify Updates to Dev: " . join(", ", $dev_emails));
        try {
            if (!$this->option('unsend')) {
                Mail::to($emails)->send(new MailAppUpdates("Client", $updates));
                Mail::to($dev_emails)->send(new MailAppUpdates("Contributor", $updates));
                $updates->save();
            }
        } catch (\Throwable $th) {
            $this->error($th->getMessage());
            return Command::FAILURE;
        }
        $this->info("Notify Update success");
        return Command::SUCCESS;
    }
}
