<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobPostedMailable extends Mailable
{

    use SerializesModels;

    public $job;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job)
    {
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $donor = $this->job->getDonor();

        return $this->to(config('mail.recieve_to.address'), config('mail.recieve_to.name'))
        ->subject('Employer/Company "'.$donor->name . '" has posted new job on "' . config('app.name'))
        ->view('emails.job_posted_message')
        ->with(
			[
				'name'=>$donor->name,
				'link'=>route('job.detail', [$this->job->slug]),
				'link_admin'=>route('edit.job', ['id' => $this->job->id])
			]
		);
    }

}
