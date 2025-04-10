<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Terima kasih telah mendaftar! Silakan verifikasi alamat email Anda dalam waktu 24 jam dengan mengklik tautan verifikasi yang telah kami kirimkan ke email Anda.') }}
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('Kirim ulang email verifikasi') }}
            </x-button>
        </div>
    </x-auth-card>
</x-guest-layout>
