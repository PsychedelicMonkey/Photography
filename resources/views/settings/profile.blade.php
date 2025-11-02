@extends('layouts.settings')

@section('form')
    @if (session('status') === 'profile-updated')
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

    <div class="my-4 flex justify-between items-baseline">
        <h1 class="text-3xl font-semibold">{{ __('Edit your profile') }}</h1>

        @if ($user->hasVerifiedEmail())
            <span class="badge badge-success">{{ __('Account confirmed') }}</span>
        @endif
    </div>

    @if (! $user->hasVerifiedEmail())
        <div class="bg-error text-error-content p-4 rounded-box my-4 space-y-4">
            <div>
                <h2 class="text-lg font-bold">{{ __('Your account is not confirmed.') }}</h2>
                <p>{{ __('You must verify your email address to upload photos or create albums.') }}</p>
            </div>

            <form action="{{ route('verification.send') }}" method="post">
                @csrf

                <button type="submit" class="btn">{{ __('Send new verification email') }}</button>
            </form>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="post">
        @csrf
        @method('PATCH')
        <fieldset class="fieldset w-full p-4 border border-base-300 bg-base-200 rounded-box">
            <label for="name" class="label">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="input w-full" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" />
            <x-input-error :messages="$errors->get('name')" />

            <label for="email" class="label">{{ __('Email address') }}</label>
            <input type="email" name="email" id="email" class="input w-full" placeholder="{{ __('Email address') }}" value="{{ old('email', $user->email) }}" />
            <x-input-error :messages="$errors->get('email')" />

            <button type="submit" class="btn btn-neutral">{{ __('Update profile') }}</button>
        </fieldset>
    </form>
@endsection
