@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4 lg:p-6">
        @if (session()->has('status'))
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <div class="my-4">
            <h1 class="text-3xl font-semibold">{{ __('Login') }}</h1>
        </div>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <fieldset class="fieldset w-xs p-4 border border-base-300 bg-base-200 rounded-box">
                <label for="email" class="label">{{ __('Email address') }}</label>
                <input type="email" name="email" id="email" class="input" placeholder="{{ __('Email address') }}" value="{{ old('email') }}" />
                <x-input-error :messages="$errors->get('email')" />

                <label for="password" class="label">{{ __('Password') }}</label>
                <input type="password" name="password" id="password" class="input" placeholder="{{ __('Password') }}" />
                <x-input-error :messages="$errors->get('password')" />

                <a class="underline" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>

                <label class="label">
                    <input type="checkbox" name="remember" id="remember" class="checkbox" />
                    {{ __('Remember me') }}
                </label>

                <button type="submit" class="btn btn-neutral">{{ __('Login') }}</button>
            </fieldset>
        </form>
    </div>
@endsection
