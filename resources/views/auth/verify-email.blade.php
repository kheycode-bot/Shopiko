<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="/user/assets/imgs/logo/logo.png" alt="App Logo" class="mx-auto mb-4" style="max-width: 150px;">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 text-center">
            {{ __('Before continuing, please verify your email address by clicking the link we sent to your email. If you did not receive the email, we can send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 text-center">
                {{ __('A new verification link has been sent to your email address.') }}
            </div>
        @endif

        <div class="mt-4 flex flex-col items-center justify-center gap-4">
            <!-- Resend Verification Email -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-button type="submit">
                    {{ __('Resend Verification Email') }}
                </x-button>
            </form>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <x-button type="submit" class="bg-red-500 hover:bg-red-600 text-white">
                    {{ __('Log Out') }}
                </x-button>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
