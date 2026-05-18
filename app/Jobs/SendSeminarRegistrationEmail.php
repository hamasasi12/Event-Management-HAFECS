<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Seminar;
use App\Models\SeminarRegistration;
use App\Mail\SeminarRegistrationMail;

class SendSeminarRegistrationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $seminar;
    public $seminarRegistration;
    public $password;
    
    /**
     * Create a new job instance.
     */
    public function __construct(Seminar $seminar, SeminarRegistration $seminarRegistration, $password = null)
    {
        $this->seminar = $seminar;
        $this->seminarRegistration = $seminarRegistration;
        $this->password = $password;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->seminarRegistration->email)
            ->send(new SeminarRegistrationMail($this->seminar, $this->seminarRegistration, $this->password));
    }
}
