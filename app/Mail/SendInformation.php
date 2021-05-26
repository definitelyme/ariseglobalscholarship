<?php

namespace App\Mail;

use App\Models\ScholarshipRun;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Translation\HasLocalePreference;
use PhpParser\Node\Expr\Cast\Bool_;

class SendInformation extends Mailable implements ShouldQueue, HasLocalePreference
{
    use Queueable, SerializesModels;

    /**
     * The user to receive mailable.
     *
     * @var \App\Models\ScholarshipRun
     */
    public $user;

    /**
     * The current scholarship run.
     *
     * @var \App\Models\ScholarshipRun
     */
    public $scholarship_run;

    /**
     * The Subject.
     *
     * @var String
     */
    public $subject;

    /**
     * The Mailable Body.
     *
     * @var String
     */
    public $body;

    /**
     * Whether to display action button.
     *
     * @var Boolean
     */
    public $has_action_button;

    /**
     * The link for button.
     *
     * @var String
     */
    public $route;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        User $user,
        ScholarshipRun $run,
        String $subject,
        String $body,
        Bool $has_action_button,
        String $route
    ) {
        $this->user = $user;
        $this->scholarship_run = $run;
        $this->subject = $subject;
        $this->body = $body;
        $this->has_action_button = $has_action_button;
        $this->route = $route;
    }

    /**
     * Get the user's preferred locale.
     *
     * @return string
     */
    public function preferredLocale()
    {
        return $this->locale;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("no-reply@ariseglobalscholarship.org", "Arise Global Scholarship")
            ->subject($this->subject)
            ->markdown('emails.scholarship.general');
    }
}
