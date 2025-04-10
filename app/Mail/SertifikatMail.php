<?php

namespace App\Mail;

use App\Models\Sertifikat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class SertifikatMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sertifikat;

    /**
     * Create a new message instance.
     */
    public function __construct(Sertifikat $sertifikat)
    {
        $this->sertifikat = $sertifikat;
    }

    /**
     * Build the message.
     */
public function build()
{
    $backgroundImage = $this->sertifikat->background_image 
        ? storage_path('app/public/' . $this->sertifikat->background_image) 
        : null;

    $pdf = Pdf::loadView('sertifikat.pdf', [
        'sertifikat' => $this->sertifikat,
        'backgroundImage' => $backgroundImage,
    ]);

    return $this->from(config('mail.from.address'), config('mail.from.name'))
                ->subject('Sertifikat Anda')
                ->markdown('emails.sertifikat')
                ->attachData($pdf->output(), 'Sertifikat_' . $this->sertifikat->nama . '.pdf', [
                    'mime' => 'application/pdf',
                ]);
}


    
}
