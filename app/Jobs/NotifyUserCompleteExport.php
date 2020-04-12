<?php

namespace App\Jobs;

use App\Notifications\ExportReady;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class NotifyUserCompleteExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $filePath;

    /**
     * Create a new job instance.
     *
     * @param user $user
     */
    public function __construct( $user, $filePath)
    {
        $this->user = $user;
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       $this->user->notify(new ExportReady($this->filePath));
    }
}
