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
                        <label for="ruangan_nama" class="form-label">{{ __('ruangan.field.ruangan_nama') }}</label>
                        <input type="text" id="ruangan_nama" name="ruangan_nama" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('ruangan.field.ruangan_nama') }}"
                            value="{{ $ruangan->ruangan_nama }}" disabled>
                        <x-input-error :messages="$errors->get('ruangan_nama')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="ruangan_kapasitas"
                            class="form-label">{{ __('ruangan.field.ruangan_kapasitas') }}</label>
                        <input type="text" id="ruangan_kapasitas" name="ruangan_kapasitas" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('ruangan.field.ruangan_kapasitas') }}"
                            value="{{ $ruangan->ruangan_kapasitas }}" disabled>
                        <x-input-error :messages="$errors->get('ruangan_kapasitas')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="ruangan_fasilitas"
                            class="form-label">{{ __('ruangan.field.ruangan_fasilitas') }}</label>
                        <input type="text" id="ruangan_fasilitas" name="ruangan_fasilitas" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('ruangan.field.ruangan_fasilitas') }}"
                            value="{{ $ruangan->ruangan_fasilitas }}" disabled>
                        <x-input-error :messages="$errors->get('ruangan_fasilitas')" class="mt-2" />
                    </div>
                    <div class="input-area">
                        <label for="ruangan_foto" class="form-label">{{ __('ruangan.field.ruangan_foto') }}</label>
                        <div class="card">
                            <div class="card-body flex flex-col p-6">
                                <div class="card-text h-full ">
                                    <img src="{{ Storage::url($ruangan->ruangan_foto) }}" class="rounded-md"
                                        alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
