<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">
        <a class="flex items-center" href="{{ url('/') }}">
            <img src="{{ asset('backend/images/logo/logo-batu.svg') }}" class="black_logo" alt="logo">
            <img src="{{ asset('backend/images/logo/logo-batu.svg') }}" class="white_logo" alt="logo">
            <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">Bagian Umum</span>
        </a>
        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow"
        class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
    opacity-0">
    </div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50"
        id="sidebar_menus">
        @php
            $route = Route::currentRouteName();
        @endphp
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">HOME</li>
            <li class="">
                <a href="{{ route('admin.dashboard') }}"
                    class="navItem {{ $route == 'admin.dashboard' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>{{ __('sidebar.beranda') }}</span>
                    </span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.organisasi.index') }}" class="navItem {{ Str::contains($route, 'admin.organisasi') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user-group"></iconify-icon>
                        <span>{{ __('sidebar.organisasi') }}</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.ruangan.index') }}" class="navItem {{ Str::contains($route, 'admin.ruangan') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:archive-box"></iconify-icon>
                        <span>{{ __('sidebar.ruangan') }}</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.peminjaman.index') }}" class="navItem {{ Str::contains($route, 'admin.peminjaman') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:archive-box"></iconify-icon>
                        <span>{{ __('sidebar.peminjaman') }}</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.kalender.index') }}"
                    class="navItem {{ Str::contains($route, 'admin.kalender') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:calendar"></iconify-icon>
                        <span>{{ __('sidebar.kalender') }}</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.galeri.index') }}" class="navItem {{ Str::contains($route, 'admin.galeri') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
                        <span>{{ __('sidebar.galeri') }}</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.saran.index') }}" class="navItem {{ Str::contains($route, 'admin.saran') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:envelope"></iconify-icon>
                        <span>{{ __('sidebar.saran') }}</span>
                    </span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.mail.index') }}"
                    class="navItem {{ Str::contains($route, 'admin.mail') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:inbox"></iconify-icon>
                        <span>{{ __('sidebar.mail') }}</span>
                    </span>
                </a>
            </li>

            <li class="sidebar-menu-title">Admin</li>
            <li class="">
                <a href="{{ route('admin.user.index') }}" class="navItem {{ Str::contains($route, 'admin.user') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
                        <span>{{ __('sidebar.user') }}</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.log.index') }}"
                    class="navItem {{ Str::contains($route, 'admin.log') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
                        <span>{{ __('sidebar.log') }}</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- End: Sidebar -->
