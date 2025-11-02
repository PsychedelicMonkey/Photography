@extends('layouts.settings')

@section('form')
    @if (session('status') === 'password-updated')
        <div
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 3000)"
            x-transition
            role="alert"
            class="alert alert-success"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ __('Saved.') }}</span>
        </div>
    @endif

    <div class="my-4">
        <h1 class="text-3xl font-semibold">{{ __('Change password') }}</h1>
    </div>

    <form action="{{ route('password.update') }}" method="post">
        @csrf
        @method('PUT')
        <fieldset class="fieldset w-full p-4 border border-base-300 bg-base-200 rounded-box">
            <label for="current_password" class="label">{{ __('Current password') }}</label>
            <input type="password" name="current_password" id="current_password" class="input w-full" placeholder="{{ __('Current password') }}" />
            <x-input-error :messages="$errors->get('current_password')" />

            <label for="password" class="label">{{ __('New password') }}</label>
            <input type="password" name="password" id="password" class="input w-full" placeholder="{{ __('New password') }}" />
            <x-input-error :messages="$errors->get('password')" />

            <label for="password_confirmation" class="label">{{ __('Confirm new password') }}</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="input w-full" placeholder="{{ __('Confirm new password') }}" />
            <x-input-error :messages="$errors->get('password_confirmation')" />

            <button type="submit" class="btn btn-neutral">{{ __('Update password') }}</button>
        </fieldset>
    </form>
@endsection
