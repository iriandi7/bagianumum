@extends('user.user_template')

@section('main')
    <div id="content_layout">
        @include('partials.breadcrumb')
        <div class=" space-y-5">
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">{{ $title }}
                    </h4>
                </header>
                <div class="card-body px-6 pb-6">
                    @include('partials.alert')
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
                                                {{ __('kalender.field.title') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('peminjaman.field.organisasi_id') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('peminjaman.field.ruangan_id') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('kalender.field.start') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('kalender.field.end') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('table.action') }}
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @if ($peminjamans)
                                            @foreach ($peminjamans->kalender as $key => $kalender)
                                                <tr>
                                                    <td class="table-td">{{ $key + 1 }}</td>
                                                    <td class="table-td">{{ $kalender->title }}</td>
                                                    <td class="table-td">{{ $kalender->peminjaman->organisasi->organisasi_nama }}</td>
                                                    <td class="table-td">{{ $kalender->peminjaman->ruangan->ruangan_nama }}</td>
                                                    <td class="table-td">{{ $kalender->start }}</td>
                                                    <td class="table-td">{{ $kalender->end }}</td>
                                                    <td class="table-td ">
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <a href="{{ route('user.kalender.show', $kalender->id) }}"
                                                                class="toolTip onTop justify-center action-btn"
                                                                data-tippy-content="{{ __('table.show') }}"
                                                                data-tippy-theme="primary">
                                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                            </a>
                                                            <form
                                                                action="{{ route('user.kalender.destroy', $kalender->id) }}"
                                                                method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="toolTip onTop justify-center action-btn"
                                                                    type="submit"
                                                                    data-tippy-content="{{ __('table.delete') }}"
                                                                    id="delete" data-tippy-theme="danger">
                                                                    <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
