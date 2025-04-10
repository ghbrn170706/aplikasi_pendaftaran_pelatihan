@component('mail::message')
# Halo, {{ $sertifikat->nama }}

Selamat! Anda telah menyelesaikan pelatihan **{{ $sertifikat->pelatihan }}** pada tanggal **{{ $sertifikat->tanggal->format('d M Y') }}**.

Sertifikat Anda terlampir dalam email ini.

Terima kasih telah mengikuti pelatihan!

@component('mail::button', ['url' => route('sertifikat.generatePdf', $sertifikat->id)])
Lihat Sertifikat
@endcomponent

Salam,<br>
{{ config('app.name') }}
@endcomponent
