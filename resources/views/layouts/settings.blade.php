@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4 lg:p-6">
        @if (session()->has('status'))
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
                <span>{{ session()->get('status') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <ul class="menu w-full">
                <li class="menu-title">{{ __('Account settings') }}</li>
                <li @class(['menu-active' => request()->routeIs('profile.edit')])>
                    <a href="{{ route('profile.edit') }}">{{ __('Edit profile') }}</a>
                </li>
                <li @class(['menu-active' => request()->routeIs('password.edit')])>
                    <a href="{{ route('password.edit') }}">{{ __('Update password') }}</a>
                </li>
                <li>
                    <a href="#">{{ __('Close account') }}</a>
                </li>
            </ul>

            <div class="col-span-2">
                @yield('form')
            </div>
        </div>

    </div>
@endsection
