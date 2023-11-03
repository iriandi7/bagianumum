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

                    <div id="calendar-new"></div>


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
                    const url = {{ Js::from(route('user.kalender.show', ':path')) }};
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
