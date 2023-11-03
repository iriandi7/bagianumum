@extends('home.home_template')


@section('main')
    <div class="lg:flex flex-wrap blog-posts lg:space-x-5 space-y-5 lg:space-y-0 rtl:space-x-reverse">
        <div class="flex-1">
            <div class="grid xl:grid-cols-2 grid-cols-1 gap-5 mb-2">
                @foreach ($galeries as $galeri)
                <div class="card">
                    <div class=" h-[248px] w-full mb-6 ">
                        <img src="{{ Storage::url($galeri->galeri_foto) }}" alt="{{ $galeri->galeri_judul }}" class=" w-full h-full  object-cover">
                    </div>
                    <div class="px-6 pb-6">
                        <div class="flex justify-between mb-4">
                            <div>
                                <h5 class="card-title text-slate-900">
                                    <a href="{{ route('home.galeri.show', $galeri->id) }}">{{ $galeri->galeri_judul }}</a>
                                </h5>
                            </div>
                            <div
                                class="inline-flex leading-5 text-slate-500 dark:text-slate-400 text-sm font-normal">
                                <span>
                                    <iconify-icon icon="heroicons-outline:calendar"
                                        class="text-slate-400 dark:text-slate-400 ltr:mr-2 rtl:ml-2 text-lg"></iconify-icon>
                                </span>
                                <span>
                                    {{ \Carbon\Carbon::parse($galeri->created_at)->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                        <div class="card-text dark:text-slate-300 mt-4">
                            <p>{{ Str::limit($galeri->galeri_desc, 110) }}</p>
                            <div class="mt-4 space-x-4 rtl:space-x-reverse">
                                <a href="{{ route('home.galeri.show', $galeri->id) }}" class="btn-a">
                                    {{ __('galeri.learn_more') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $galeries->links('pagination::simple-tailwind') }}
        </div>
    </div>
@endsection
