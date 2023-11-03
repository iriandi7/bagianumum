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
                <form class="space-y-4" method="POST" action="{{ route('admin.mail.store') }}">
                    @csrf
                    <div class="input-area relative">
                        <label for="email" class="form-label">{{ __('mail.field.email') }}
                            <x-required /></label>
                        <input type="text" id="email" name="email" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('mail.field.email') }}"
                            value="{{ old('email', request()->email) }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="subject" class="form-label">{{ __('mail.field.subject') }}
                            <x-required /></label>
                        <input type="text" id="subject" name="subject" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('mail.field.subject') }}"
                            value="{{ old('subject') }}">
                        <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="message" class="form-label">{{ __('mail.field.message') }}
                            <x-required /></label>
                        <textarea id="message" name="message" rows="5" class="form-control my-editor"
                            placeholder="{{ __('table.enter') }} {{ __('mail.field.message') }}">{!! old('message') !!}</textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>
                    <button class="btn inline-flex justify-center btn-dark">{{ __('table.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
