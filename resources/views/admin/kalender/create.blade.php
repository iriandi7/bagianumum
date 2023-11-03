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
                <form class="space-y-4" method="POST" action="{{ route('admin.kalender.store') }}">
                    @csrf
                    <div class="input-area relative">
                        <label for="title" class="form-label">{{ __('kalender.field.title') }}</label>
                        <input type="text" id="title" name="title" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('kalender.field.title') }}"
                            value="{{ old('title') }}">
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="start" class="form-label">{{ __('kalender.field.start') }}</label>
                        <input type="datetime-local" id="start" name="start" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('kalender.field.start') }}"
                            value="{{ old('start') }}">
                        <x-input-error :messages="$errors->get('start')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="end" class="form-label">{{ __('kalender.field.end') }}</label>
                        <input type="datetime-local" id="end" name="end" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('kalender.field.end') }}"
                            value="{{ old('end') }}">
                        <x-input-error :messages="$errors->get('end')" class="mt-2" />
                    </div>
                    <button class="btn inline-flex justify-center btn-dark">{{ __('table.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
