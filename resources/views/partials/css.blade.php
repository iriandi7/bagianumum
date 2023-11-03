<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>{{ $title ?? 'User' }} | Bagian Umum Kota Batu</title>
    <link rel="icon" type="image/png" href="{{ asset('backend/images/logo/favicon.svg') }}">
    <!-- BEGIN: Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- END: Google Font -->
    <link rel="stylesheet" href="{{ asset('backend/css/rt-plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/sidebar-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/app.css') }}">
    <!-- BEGIN: Theme CSS-->
    {{-- @vite([
        'resources/css/rt-plugins.css',
        'resources/css/sidebar-menu.css',
        'resources/css/app.css',
    ]) --}}

    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
    <script src="{{ asset('backend/tinymce/tinymce.min.js') }}"></script>
    <!-- END: Theme CSS-->
    <script src="{{ asset('backend/js/settings.js') }}" sync></script>
  </head>
