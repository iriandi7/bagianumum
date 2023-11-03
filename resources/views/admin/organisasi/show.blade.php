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
                <form class="space-y-4">
                    <div class="input-area relative">
                        <label for="organisasi_nama" class="form-label">{{ __('organisasi.field.organisasi_nama') }}
                            <x-required /></label>
                        <input type="text" id="organisasi_nama" name="organisasi_nama" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('organisasi.field.organisasi_nama') }}"
                            value="{{ $organisasi->organisasi_nama }}" disabled>
                        <x-input-error :messages="$errors->get('organisasi_nama')" class="mt-2" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
