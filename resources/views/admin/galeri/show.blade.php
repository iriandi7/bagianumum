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
                        <label for="galeri_judul" class="form-label">{{ __('galeri.field.galeri_judul') }}</label>
                        <input type="text" id="galeri_judul" name="galeri_judul" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('galeri.field.galeri_judul') }}"
                            value="{{ $galeri->galeri_judul }}">
                        <x-input-error :messages="$errors->get('galeri_judul')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="galeri_desc" class="form-label">{{ __('galeri.field.galeri_desc') }}</label>
                        <textarea id="galeri_desc" name="galeri_desc" rows="5" class="form-control my-editor"
                            placeholder="{{ __('table.enter') }} {{ __('galeri.field.galeri_desc') }}">{!! $galeri->galeri_desc !!}</textarea>
                        <x-input-error :messages="$errors->get('galeri_desc')" class="mt-2" />
                    </div>
                    <div class="input-area">
                        <label for="galeri_foto" class="form-label">{{ __('galeri.field.galeri_foto') }}</label>
                        <div class="card">
                            <div class="card-body flex flex-col p-6">
                                <div class="card-text h-full ">
                                    <img src="{{ Storage::url($galeri->galeri_foto) }}" class="rounded-md" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
