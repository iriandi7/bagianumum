@extends('admin.admin_template')

@section('main')
    <div id="content_layout">
        @include('partials.breadcrumb')
        <div class=" space-y-5">
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">{{ $title }}
                    </h4>
                </header>
                @include('partials.alert')
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
                                                {{ __('log.field.log_name') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('log.field.description') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('log.field.subject_type') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('log.field.event') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('log.field.subject_id') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('log.field.causer_type') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('log.field.causer_type') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('log.field.properties') }}
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                {{ __('log.field.time') }}
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($logs as $key => $log)
                                            <tr>
                                                <td class="table-td">{{ $key + 1 }}</td>
                                                <td class="table-td">{{ $log->log_name }}</td>
                                                <td class="table-td">{{ $log->description }}</td>
                                                <td class="table-td">{{ $log->subject_type }}</td>
                                                <td class="table-td">{{ $log->event }}</td>
                                                <td class="table-td">{{ $log->subject_id }}</td>
                                                <td class="table-td">{{ $log->causer_type }}</td>
                                                <td class="table-td">{{ $log->causer_id }}</td>
                                                <td class="table-td">{{ $log->properties }}</td>
                                                <td class="table-td">
                                                    {{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}</td>
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
