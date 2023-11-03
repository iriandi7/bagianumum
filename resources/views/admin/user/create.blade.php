@extends('admin.admin_template')

@section('main')
    @include('partials.breadcrumb')
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">{{ $title }}</div>
                </div>
            </header>
            <div class="card-text h-full ">
                @include('partials.alert')
                <form class="space-y-4" method="POST" action="{{ route('admin.user.store') }}">
                    @csrf
                    <div class="input-area relative">
                        <label for="name" class="form-label">{{ __('user.field.name') }}</label>
                        <input type="text" id="name" name="name" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('user.field.name') }}" value="{{ old('name') }}">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="email" class="form-label">{{ __('user.field.email') }}</label>
                        <input type="text" id="email" name="email" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('user.field.email') }}" value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="no_phone" class="form-label">{{ __('user.field.no_phone') }}</label>
                        <input type="text" id="no_phone" name="no_phone" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('user.field.no_phone') }}"
                            value="{{ old('no_phone') }}">
                        <x-input-error :messages="$errors->get('no_phone')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="password" class="form-label">{{ __('user.field.password') }}</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('user.field.password') }}">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="password_confirmation"
                            class="form-label">{{ __('user.field.password_confirmation') }}</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('user.field.password_confirmation') }}">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <button class="btn inline-flex justify-center btn-dark">{{ __('table.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
