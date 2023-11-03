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
                <form class="space-y-4">
                    <div class="input-area relative">
                        <label for="name" class="form-label">{{ __('user.field.name') }}</label>
                        <input type="text" id="name" name="name" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('user.field.name') }}" value="{{ $user->name }}"
                            disabled>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="email" class="form-label">{{ __('user.field.email') }}</label>
                        <input type="text" id="email" name="email" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('user.field.email') }}" value="{{ $user->email }}"
                            disabled>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="no_phone" class="form-label">{{ __('user.field.no_phone') }}</label>
                        <input type="text" id="no_phone" name="no_phone" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('user.field.no_phone') }}"
                            value="{{ $user->no_phone }}">
                        <x-input-error :messages="$errors->get('no_phone')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="role" class="form-label">{{ __('user.field.role') }}</label>
                        <input type="text" id="role" name="role" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('user.field.role') }}"
                            value="{{ $user->role }}">
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
