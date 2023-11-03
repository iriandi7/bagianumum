@extends('home.home_template')


@section('main')
    <div class="space-y-5">
        <!-- Basic Image -->
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full ">
                    <img src="{{ asset('frontend/image/hero.png') }}" class="rounded-md" alt="image">
                </div>
            </div>
        </div>

        <div class="card">

            <header class=" card-header noborder">
                <h4 class="card-title">{{ __('navbar.calendar-grid') }}
                </h4>
            </header>
            <div class="card-body px-6 pb-6">
                <div id="calendar-new"></div>
            </div>
        </div>

        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">{{ __('home.title.ruangan') }}
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
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
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

@push('js')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar-new');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
                },
                // initialView: "dayGridMonth",
                // slotMinTime: '8:00:00',
                // slotMaxTime: '19:00:00',
                // events: @json($events),
                initialView: "dayGridMonth",
                events: @json($events),
                editable: false,
                selectable: false,
                selectMirror: true,
                // dayMaxEvents: 2,
                weekends: true,
                eventClick: (info) => {
                    const url = {{ Js::from(route('home.kalender.show', ':path')) }};
                    const newUrl = url.replaceAll(":path", info.event.id);
                    window.open(
                        newUrl, "_blank");
                },
            });
            calendar.render();
        });
        console.log('Log')
        console.log(calendarEl);
        console.log(calendar);
    </script>
@endpush
