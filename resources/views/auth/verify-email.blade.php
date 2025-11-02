@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4 lg:p-6">
        <h1 class="text-3xl font-semibold">{{ __('Confirm your account') }}</h1>

        <div class="my-4">
            <p>{{ __('You must confirm your account before you can proceed.') }}</p>
            <p>{{ __('Confirm your account by clicking on the link we sent you during registration.') }}</p>
            <p>{{ __('If you do not have a verification link, click the button below to request a new link.') }}</p>
        </div>

        <form action="{{ route('verification.send') }}" method="post">
            @csrf

            <button type="submit" class="btn btn-warning">{{ __('Resend verification link') }}</button>
        </form>
    </div>
@endsection
