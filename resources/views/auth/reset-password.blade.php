@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4 lg:p-6">
        <h1 class="text-3xl font-semibold">{{ __('Reset your password') }}</h1>

        <form action="{{ route('password.store') }}" method="post">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}" />

            <fieldset class="fieldset w-xs p-4 border border-base-300 bg-base-200 rounded-box">
                <label for="email" class="label">{{ __('Email address') }}</label>
                <input type="email" name="email" id="email" class="input" placeholder="{{ __('Email address') }}" value="{{ old('email', $request->email) }}" />
                <x-input-error :messages="$errors->get('email')" />

                <label for="password" class="label">{{ __('Password') }}</label>
                <input type="password" name="password" id="password" class="input" placeholder="{{ __('Password') }}" />
                <x-input-error :messages="$errors->get('password')" />

                <label for="password_confirmation" class="label">{{ __('Password confirmation') }}</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input" placeholder="{{ __('Password confirmation') }}" />
                <x-input-error :messages="$errors->get('password_confirmation')" />

                <button type="submit" class="btn btn-neutral">{{ __('Reset password') }}</button>
            </fieldset>
        </form>
    </div>
@endsection
