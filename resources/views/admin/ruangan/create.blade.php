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
                <form class="space-y-4" method="POST" action="{{ route('admin.ruangan.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="input-area relative">
                        <label for="ruangan_nama" class="form-label">{{ __('ruangan.field.ruangan_nama') }}
                            <x-required /></label>
                        <input type="text" id="ruangan_nama" name="ruangan_nama" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('ruangan.field.ruangan_nama') }}"
                            value="{{ old('ruangan_nama') }}">
                        <x-input-error :messages="$errors->get('ruangan_nama')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="ruangan_kapasitas" class="form-label">{{ __('ruangan.field.ruangan_kapasitas') }}
                            <x-required /></label>
                        <input type="text" id="ruangan_kapasitas" name="ruangan_kapasitas" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('ruangan.field.ruangan_kapasitas') }}"
                            value="{{ old('ruangan_kapasitas') }}">
                        <x-input-error :messages="$errors->get('ruangan_kapasitas')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="ruangan_fasilitas" class="form-label">{{ __('ruangan.field.ruangan_fasilitas') }}
                            <x-required /></label>
                        <input type="text" id="ruangan_fasilitas" name="ruangan_fasilitas" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('ruangan.field.ruangan_fasilitas') }}"
                            value="{{ old('ruangan_fasilitas') }}">
                        <x-input-error :messages="$errors->get('ruangan_fasilitas')" class="mt-2" />
                    </div>
                    <div class="input-area">
                        <label for="ruangan_foto" class="form-label">{{ __('ruangan.field.ruangan_foto') }}
                            <x-required /></label>
                        <div class="filePreview">
                            <label>
                                <input type="file" class=" w-full hidden" id="ruangan_foto" name="ruangan_foto">
                                <span class="w-full h-[40px] file-control flex items-center custom-class">
                                    <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                                        <span id="placeholder" class="text-slate-400">{{ __('table.input.image') }}</span>
                                    </span>
                                    <span
                                        class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                                </span>
                            </label>
                            <x-input-error :messages="$errors->get('ruangan_foto')" class="mt-2" />
                            <div id="file-preview"></div>
                        </div>
                    </div>
                    <div id="file-preview"></div>
                    <button class="btn inline-flex justify-center btn-dark">{{ __('table.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
