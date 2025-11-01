@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4 lg:p-6">
        <div>
            @if (session()->has('status'))
                <div role="alert" class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session()->get('status') }}</span>
                </div>
            @endif
        </div>

        <h1 class="text-3xl font-semibold">{{ __('Edit your profile') }}</h1>

        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            @method('PATCH')
            <fieldset class="fieldset w-xs p-4 border border-base-300 bg-base-200 rounded-box">
                <label for="name" class="label">{{ __('Name') }}</label>
                <input type="text" name="name" id="name" class="input" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" />
                <x-input-error :messages="$errors->get('name')" />

                <label for="email" class="label">{{ __('Email address') }}</label>
                <input type="email" name="email" id="email" class="input" placeholder="{{ __('Email address') }}" value="{{ old('email', $user->email) }}" />
                <x-input-error :messages="$errors->get('email')" />

                <button type="submit" class="btn btn-neutral">{{ __('Update profile') }}</button>
            </fieldset>
        </form>
    </div>
@endsection
