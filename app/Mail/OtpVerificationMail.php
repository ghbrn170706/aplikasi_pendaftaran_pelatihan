<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;

    // Konstruktor untuk menerima OTP
    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    // Mengatur tampilan email
    public function build()
    {
        return $this->view('emails.otp')
                    ->subject('Verifikasi OTP untuk Pendaftaran')
                    ->with(['otp' => $this->otp]);
    }
}
