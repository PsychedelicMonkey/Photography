@extends('layouts.settings')

@section('form')
    <div class="my-4">
        <h1 class="text-3xl font-semibold">{{ __('Edit your profile') }}</h1>
    </div>

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
