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
                <form class="space-y-4" method="POST" action="{{ route('admin.saran.update', $saran->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="input-area relative">
                        <label for="saran_nama" class="form-label">{{ __('saran.field.saran_nama') }} <x-required /></label>
                        <input type="text" id="saran_nama" name="saran_nama" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('saran.field.saran_nama') }}"
                            value="{{ $saran->saran_nama }}">
                        <x-input-error :messages="$errors->get('saran_nama')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="saran_email" class="form-label">{{ __('saran.field.saran_email') }}
                            <x-required /></label>
                        <input type="text" id="saran_email" name="saran_email" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('saran.field.saran_email') }}"
                            value="{{ $saran->saran_email }}">
                        <x-input-error :messages="$errors->get('saran_email')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="saran_desc" class="form-label">{{ __('saran.field.saran_desc') }}
                            <x-required /></label>
                        <textarea type="text" id="saran_desc" name="saran_desc" class="form-control" rows="7"
                            placeholder="{{ __('table.enter') }} {{ __('saran.field.saran_desc') }}">{{ $saran->saran_desc }}</textarea>
                        <x-input-error :messages="$errors->get('saran_desc')" class="mt-2" />
                    </div>
                    <button class="btn inline-flex justify-center btn-dark">{{ __('table.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
