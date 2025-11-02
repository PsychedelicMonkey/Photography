<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @auth
        @if(session('status') === 'verification-link-sent')
            <div
                x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 3000)"
                role="alert"
                class="fixed top-0 w-full bg-success text-success-content text-center text-sm p-4"
            >
                {{ __('Verification link sent.') }}
            </div>
        @endif

        @if (! auth()->user()->hasVerifiedEmail())
            <div class="bg-neutral text-neutral-content p-4 text-center text-sm">
                {{ __('Your email :email has not been confirmed.', ['email' => auth()->user()->email]) }}
                <form action="{{ route('verification.send') }}" method="post" class="inline">
                    @csrf
                    <button type="submit" class="underline cursor-pointer">{{ __('Resend verification link.') }}</button>
                </form>
            </div>
        @endif
    @endauth

    @include('layouts.navigation')

    <main>
        @yield('content')
    </main>
</body>
</html>
