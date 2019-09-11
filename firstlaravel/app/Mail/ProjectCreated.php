<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $project; // setup to receive project-object
    public $subject; // setup to receive specific project-title

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($project,$subject)
    {
        $this->project = $project;
        $this->subject = 'Project: "' . $subject . '" created!';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.project-created');
    }
}
