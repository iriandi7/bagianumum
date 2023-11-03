@extends('admin.admin_template')

@section('main')
    <div id="content_layout">
        @include('partials.breadcrumb')
        <div class=" space-y-5">
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">{{ $title }}
                    </h4>

                    <div>
                        <a href="{{ route('admin.peminjaman.create') }}">
                            <button class="btn inline-flex justify-center btn-primary ">
                                <span class="flex items-center">
                                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2"
                                        icon="heroicons-outline:plus-circle"></iconify-icon>
                                    <span>{{ __('table.add') }}</span>
                                </span>
                            </button>
                        </a>
                        <a href="{{ route('admin.peminjaman.excel') }}" class="ml-2">
                            <button class="btn inline-flex justify-center btn-info ">
                                <span class="flex items-center">
                                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2"
                                        icon="heroicons-outline:arrow-up-tray"></iconify-icon>
                                    <span>{{ __('table.export') }}</span>
                                </span>
                            </button>
                        </a>
                    </div>
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
                                                {{ __('peminjaman.field.user_id') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('peminjaman.field.organisasi_id') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('peminjaman.field.nama_acara') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('peminjaman.field.tanggal_pinjam') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('peminjaman.field.tanggal_kembali') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('peminjaman.field.ruangan_id') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('peminjaman.field.no_surat') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('peminjaman.field.peminjaman_status') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('table.action') }}
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($peminjamans as $key => $peminjaman)
                                            <tr>
                                                <td class="table-td">{{ $key + 1 }}</td>
                                                <td class="table-td">{{ $peminjaman->user->name }}</td>
                                                <td class="table-td">{{ $peminjaman->organisasi->organisasi_nama }}</td>
                                                <td class="table-td">{{ $peminjaman->nama_acara }}</td>
                                                <td class="table-td">{{ $peminjaman->tanggal_pinjam }}</td>
                                                <td class="table-td">{{ $peminjaman->tanggal_kembali }}</td>
                                                <td class="table-td">{{ $peminjaman->ruangan->ruangan_nama }}</td>
                                                <td class="table-td">{{ $peminjaman->no_surat }}</td>
                                                <td class="table-td">
                                                    @php
                                                        $badge = 'primary';
                                                        switch ($peminjaman->peminjaman_status) {
                                                            case 'Proses':
                                                                $badge = 'info';
                                                                break;
                                                            case 'Tolak':
                                                                $badge = 'danger';
                                                                break;
                                                            case 'Terima':
                                                                $badge = 'success';
                                                                break;
                                                        }
                                                    @endphp
                                                    <span
                                                        class="badge bg-{{ $badge }}-500 text-white capitalize rounded-3xl">
                                                        {{ $peminjaman->peminjaman_status }}
                                                    </span>
                                                </td>
                                                <td class="table-td ">
                                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                                        <a href="{{ route('admin.peminjaman.show', $peminjaman->id) }}"
                                                            class="toolTip onTop justify-center action-btn"
                                                            data-tippy-content="{{ __('table.show') }}"
                                                            data-tippy-theme="primary">
                                                            <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                        </a>
                                                        @if ($peminjaman->peminjaman_status == 'Proses')
                                                            <a href="{{ route('admin.peminjaman.edit', $peminjaman->id) }}"
                                                                class="toolTip onTop justify-center action-btn"
                                                                data-tippy-content="{{ __('table.edit') }}"
                                                                data-tippy-theme="info">
                                                                <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                            </a>
                                                            <form
                                                                action="{{ route('admin.peminjaman.destroy', $peminjaman->id) }}"
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
                                                        @endif
                                                    </div>
                                                </td>
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

    </div>
@endsection
