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
                <form class="space-y-4">
                    <div class="input-area relative">
                        <label for="user_id" class="form-label">{{ __('peminjaman.field.user_id') }}</label>
                        <input type="text" id="user_id" name="user_id" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('peminjaman.field.user_id') }}"
                            value="{{ $peminjaman->user->name }}" disabled>
                        <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="organisasi_id" class="form-label">{{ __('peminjaman.field.organisasi_id') }}</label>
                        <input type="text" id="organisasi_id" name="organisasi_id" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('peminjaman.field.organisasi_id') }}"
                            value="{{ $peminjaman->organisasi->organisasi_nama }}" disabled>
                        <x-input-error :messages="$errors->get('organisasi_id')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="nama_acara" class="form-label">{{ __('peminjaman.field.nama_acara') }}</label>
                        <input type="text" id="nama_acara" name="nama_acara" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('peminjaman.field.nama_acara') }}"
                            value="{{ $peminjaman->nama_acara }}" disabled>
                        <x-input-error :messages="$errors->get('nama_acara')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="tanggal_pinjam" class="form-label">{{ __('peminjaman.field.tanggal_pinjam') }}</label>
                        <input type="datetime-local" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('peminjaman.field.tanggal_pinjam') }}"
                            value="{{ $peminjaman->tanggal_pinjam }}" disabled>
                        <x-input-error :messages="$errors->get('tanggal_pinjam')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="tanggal_kembali"
                            class="form-label">{{ __('peminjaman.field.tanggal_kembali') }}</label>
                        <input type="datetime-local" id="tanggal_kembali" name="tanggal_kembali" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('peminjaman.field.tanggal_kembali') }}"
                            value="{{ $peminjaman->tanggal_kembali }}" disabled>
                        <x-input-error :messages="$errors->get('tanggal_kembali')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="ruangan_id" class="form-label">{{ __('peminjaman.field.ruangan_id') }}</label>
                        <input type="text" id="ruangan_id" name="ruangan_id" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('peminjaman.field.ruangan_id') }}"
                            value="{{ $peminjaman->ruangan->ruangan_nama }}" disabled>
                        <x-input-error :messages="$errors->get('ruangan_id')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="no_surat" class="form-label">{{ __('peminjaman.field.no_surat') }}</label>
                        <input type="text" id="no_surat" name="no_surat" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('peminjaman.field.no_surat') }}"
                            value="{{ $peminjaman->no_surat }}" disabled>
                        <x-input-error :messages="$errors->get('no_surat')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="peminjaman_status"
                            class="form-label">{{ __('peminjaman.field.peminjaman_status') }}</label>
                        <input type="text" id="peminjaman_status" name="peminjaman_status" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('peminjaman.field.peminjaman_status') }}"
                            value="{{ $peminjaman->peminjaman_status }}" disabled>
                        <x-input-error :messages="$errors->get('peminjaman_status')" class="mt-2" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
