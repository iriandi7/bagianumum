@extends('home.home_template')


@section('main')
<div class="space-y-5">
    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">{{ $title }}
            </h4>
        </header>
        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6 dashcode-data-table">
                <span class=" col-span-8  hidden"></span>
                <span class="  col-span-4 hidden"></span>
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table
                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                            <thead class=" bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th scope="col" class=" table-th ">
                                        Id
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        {{ __('ruangan.field.ruangan_foto') }}
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        {{ __('ruangan.field.ruangan_nama') }}
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        {{ __('ruangan.field.ruangan_kapasitas') }}
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        {{ __('ruangan.field.ruangan_fasilitas') }}
                                    </th>

                                </tr>
                            </thead>
                            <tbody
                                class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @foreach ($ruangans as $key => $ruangan)
                                    <tr>
                                        <td class="table-td">{{ $key + 1 }}</td>
                                        <td class="table-td">
                                            <img src="{{ Storage::url($ruangan->ruangan_foto) }}"
                                                class="rounded-md border-4 max-w-full w-full block"
                                                alt="{{ $ruangan->ruangan_nama }}">
                                        </td>
                                        <td class="table-td">{{ $ruangan->ruangan_nama }}</td>
                                        <td class="table-td">{{ $ruangan->ruangan_kapasitas }}</td>
                                        <td class="table-td">{{ $ruangan->ruangan_fasilitas }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
