@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4 lg:p-6">
        <div class="mb-4">
            <h1 class="text-3xl font-semibold">{{ __('Register') }}</h1>
        </div>

        <form action="{{ route('register') }}" method="post">
            @csrf
            <fieldset class="fieldset w-xs p-4 border border-base-300 bg-base-200 rounded-box">
                <label for="name" class="label">{{ __('Name') }}</label>
                <input type="text" name="name" id="name" class="input" placeholder="{{ __('Name') }}" value="{{ old('name') }}" />
                <x-input-error :messages="$errors->get('name')" />

                <label for="email" class="label">{{ __('Email address') }}</label>
                <input type="email" name="email" id="email" class="input" placeholder="{{ __('Email address') }}" value="{{ old('email') }}" />
                <x-input-error :messages="$errors->get('email')" />

                <label for="password" class="label">{{ __('Password') }}</label>
                <input type="password" name="password" id="password" class="input" placeholder="{{ __('Password') }}" />
                <x-input-error :messages="$errors->get('password')" />

                <label for="password_confirmation" class="label">{{ __('Confirm password') }}</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input" placeholder="{{ __('Confirm password') }}" />
                <x-input-error :messages="$errors->get('password_confirmation')" />

                <button type="submit" class="btn btn-neutral">{{ __('Register') }}</button>
            </fieldset>
        </form>
    </div>
@endsection
