@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4 lg:p-6">
        @if (session()->has('status'))
            <div role="alert" class="alert alert-info">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 shrink-0 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <div class="my-4">
            <h1 class="text-3xl font-semibold">{{ __('Forgot your password?') }}</h1>
        </div>

        <form action="{{ route('password.email') }}" method="post">
            @csrf
            <fieldset class="fieldset w-xs p-4 border border-base-300 bg-base-200 rounded-box">
                <label for="email" class="label">{{ __('Email address') }}</label>
                <input type="email" name="email" id="email" class="input" placeholder="{{ __('Email address') }}" value="{{ old('email') }}" />
                <x-input-error :messages="$errors->get('email')" />

                <button type="submit" class="btn btn-neutral">{{ __('Send email') }}</button>
            </fieldset>
        </form>
    </div>
@endsection
