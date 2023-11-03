@extends('user.user_template')

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
                <form class="space-y-4" method="POST" action="{{ route('user.peminjaman.store') }}">
                    @csrf
                    <div class="input-area relative">
                        <label for="organisasi_id" class="form-label">{{ __('peminjaman.field.organisasi_id') }}
                            <x-required /></label>
                        <select name="organisasi_id" id="organisasi_id" class="select2 form-control w-full mt-2 py-2">
                            @foreach ($organisasies as $organisasi)
                                <option value="{{ $organisasi->id }}"
                                    {{ $organisasi->id == old('organisasi_id') ? 'selected' : '' }}
                                    class=" inline-block font-Inter font-normal text-sm text-slate-600">
                                    {{ $organisasi->organisasi_nama }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('organisasi_id')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="nama_acara" class="form-label">{{ __('peminjaman.field.nama_acara') }}
                            <x-required /></label>
                        <input type="text" id="nama_acara" name="nama_acara" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('peminjaman.field.nama_acara') }}"
                            value="{{ old('nama_acara') }}">
                        <x-input-error :messages="$errors->get('nama_acara')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="tanggal_pinjam" class="form-label">{{ __('peminjaman.field.tanggal_pinjam') }}
                            <x-required /></label>
                        <input type="datetime-local" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('peminjaman.field.tanggal_pinjam') }}"
                            value="{{ old('tanggal_pinjam') }}">
                        <x-input-error :messages="$errors->get('tanggal_pinjam')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="tanggal_kembali" class="form-label">{{ __('peminjaman.field.tanggal_kembali') }}
                            <x-required /></label>
                        <input type="datetime-local" id="tanggal_kembali" name="tanggal_kembali" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('peminjaman.field.tanggal_kembali') }}"
                            value="{{ old('tanggal_kembali') }}">
                        <x-input-error :messages="$errors->get('tanggal_kembali')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="ruangan_id" class="form-label">{{ __('peminjaman.field.ruangan_id') }}
                            <x-required /></label>
                        <select name="ruangan_id" id="ruangan_id" class="select2 form-control w-full mt-2 py-2">
                            @foreach ($ruangans as $ruangan)
                                <option value="{{ $ruangan->id }}"
                                    {{ $ruangan->id == old('ruangan_id') ? 'selected' : '' }}
                                    class=" inline-block font-Inter font-normal text-sm text-slate-600">
                                    {{ $ruangan->ruangan_nama }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('ruangan_id')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="no_surat" class="form-label">{{ __('peminjaman.field.no_surat') }}</label>
                        <input type="text" id="no_surat" name="no_surat" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('peminjaman.field.no_surat') }}"
                            value="{{ old('no_surat') }}">
                        <x-input-error :messages="$errors->get('no_surat')" class="mt-2" />
                    </div>
                    <button class="btn inline-flex justify-center btn-dark" id="to_be_attention">{{ __('table.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
