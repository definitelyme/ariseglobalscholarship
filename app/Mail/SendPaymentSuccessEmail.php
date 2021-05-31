<?php

namespace App\Mail;

use App\Models\PaymentReceipt;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPaymentSuccessEmail extends Mailable implements ShouldQueue, HasLocalePreference
{
    use Queueable, SerializesModels;

    /**
     * The theme to use for sending this mailable
     *
     * @var mixed
     */
    public $theme = "custom";

    /**
     * The user to receive mailable.
     *
     * @var \App\Models\ScholarshipRun
     */
    public $user;

    /**
     * The related scholarship
     *
     * @var \App\Models\Scholarship
     */
    public $scholarship;

    /**
     * The payment receipt
     *
     * @var \App\Models\ScholarshipRun
     */
    public $receipt;

    /**
     * The Mailable Subject.
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
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        User $user,
        Scholarship $scholarship,
        PaymentReceipt $paymentReceipt,
        String $subject,
        String $body
    ) {
        $this->user = $user;
        $this->scholarship = $scholarship;
        $this->receipt = $paymentReceipt;
        $this->subject = $subject;
        $this->body = $body;
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
        return $this->from("ariseglobalscholarship@gmail.com", "Arise Global Scholarship")
            ->subject($this->subject)
            ->markdown('emails.scholarship.payment_successful');
    }
}
