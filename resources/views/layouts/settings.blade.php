@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4 lg:p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <ul class="menu w-full">
                <li class="menu-title">{{ __('Account settings') }}</li>
                <li @class(['menu-active' => request()->routeIs('profile.edit')])>
                    <a href="{{ route('profile.edit') }}">{{ __('Edit profile') }}</a>
                </li>
                <li @class(['menu-active' => request()->routeIs('password.edit')])>
                    <a href="{{ route('password.edit') }}">{{ __('Update password') }}</a>
                </li>
                <li @class(['menu-active' => request()->routeIs('account.delete')])>
                    <a href="{{ route('account.delete') }}">{{ __('Close account') }}</a>
                </li>
            </ul>

            <div class="col-span-2">
                @yield('form')
            </div>
        </div>

    </div>
@endsection
