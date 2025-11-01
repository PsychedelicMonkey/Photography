@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4 lg:p-6">
        <div class="mb-4">
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

                <label class="label">
                    <input type="checkbox" name="remember" id="remember" class="checkbox" />
                    {{ __('Remember me') }}
                </label>

                <button type="submit" class="btn btn-neutral">{{ __('Login') }}</button>
            </fieldset>
        </form>
    </div>
@endsection
