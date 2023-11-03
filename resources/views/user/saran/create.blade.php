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
                <form class="space-y-4" method="POST" action="{{ route('user.saran.store') }}">
                    @csrf
                    <div class="input-area relative">
                        <label for="saran_desc" class="form-label">{{ __('saran.field.saran_desc') }}
                            <x-required /></label>
                        <textarea type="text" id="saran_desc" name="saran_desc" class="form-control" rows="7"
                            placeholder="{{ __('table.enter') }} {{ __('saran.field.saran_desc') }}">{{ old('saran_desc') }}</textarea>
                        <x-input-error :messages="$errors->get('saran_desc')" class="mt-2" />
                    </div>
                    <button class="btn inline-flex justify-center btn-dark">{{ __('table.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
