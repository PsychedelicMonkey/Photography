@extends('layouts.settings')

@section('form')
    <div class="my-4 space-y-4">
        <h1 class="text-3xl font-semibold">{{ __('Close account') }}</h1>

        <p>
            <span class="text-error font-bold">{{ __('Warning:') }}</span>
            <span>{{ __('closing your account is irreversible. All your photos and albums will be deleted.') }}</span>
        </p>

        <form action="{{ route('profile.destroy') }}" method="post">
            @csrf
            @method('DELETE')

            <fieldset class="fieldset mb-4">
                <label for="password" class="label">{{ __('Current password') }}</label>
                <input type="password" name="password" id="password" class="input w-full" placeholder="{{ __('Current password') }}" />
                <x-input-error :messages="$errors->get('password')" />
            </fieldset>

            <button type="submit" class="btn btn-error">{{ __('Delete account') }}</button>
        </form>
    </div>
@endsection
