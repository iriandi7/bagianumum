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
                        <a href="{{ route('admin.user.create') }}">
                            <button class="btn inline-flex justify-center btn-primary ">
                                <span class="flex items-center">
                                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2"
                                        icon="heroicons-outline:plus-circle"></iconify-icon>
                                    <span>{{ __('table.add') }}</span>
                                </span>
                            </button>
                        </a>
                        <a href="{{ route('admin.user.archive') }}">
                            <button class="btn inline-flex justify-center btn-secondary ">
                                <span class="flex items-center">
                                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2"
                                        icon="heroicons-outline:archive-box-arrow-down"></iconify-icon>
                                    <span>Arsip</span>
                                </span>
                            </button>
                        </a>
                        <a href="" class="ml-2">
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
                                                {{ __('user.field.name') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('user.field.email') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('user.field.no_phone') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('user.field.role') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('user.field.email_verified') }}
                                            </th>

                                            <th scope="col" class=" table-th ">
                                                {{ __('table.action') }}
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td class="table-td">{{ $key + 1 }}</td>
                                                <td class="table-td">
                                                    <span class="flex">
                                                        <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                            <img src="{{ Storage::url($user->profile_photo) }}"
                                                                alt="{{ $user->name }}"
                                                                class="object-cover w-full h-full rounded-full">
                                                        </span>
                                                        <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">
                                                            {{ $user->name }}
                                                        </span>
                                                    </span>
                                                </td>
                                                <td class="table-td"><a
                                                        href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                                <td class="table-td">{{ $user->no_phone }}</td>
                                                <td class="table-td">{{ $user->role }}</td>
                                                <td class="table-td">
                                                    {{ $user->email_verified_at ? \Carbon\Carbon::parse($user->email_verified_at)->diffForHumans() : 'Null' }}
                                                </td>
                                                <td class="table-td ">
                                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                                        <a href="{{ route('admin.user.show', $user->id) }}"
                                                            class="toolTip onTop justify-center action-btn"
                                                            data-tippy-content="{{ __('table.show') }}"
                                                            data-tippy-theme="primary">
                                                            <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                        </a>
                                                        <form action="{{ route('admin.user.update', $user->id) }}"
                                                            method="post">
                                                            @method('PUT')
                                                            @csrf
                                                            <button class="toolTip onTop justify-center action-btn"
                                                                type="submit" data-tippy-content="{{ __('table.role') }}"
                                                                id="changeRole" data-tippy-theme="warning">
                                                                <iconify-icon
                                                                    icon="heroicons:arrow-path-solid"></iconify-icon>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('admin.user.destroy', $user->id) }}"
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
