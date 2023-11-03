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
            <li class="menu-item-has-children">
                <a href="{{ route('home.index') }}">
                    <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                        <span class="icon-box">
                            <iconify-icon icon="heroicons-outline:home">
                            </iconify-icon>
                        </span>
                        <div class="text-box">{{ __('home.title.index') }}</div>
                    </div>
                </a>
            </li>
            <li class="menu-item-has-children">
                <a href="{{ route('home.profil') }}">
                    <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                        <span class="icon-box">
                            <iconify-icon icon="heroicons-outline:calendar">
                            </iconify-icon>
                        </span>
                        <div class="text-box">{{ __('home.title.profil') }}</div>
                    </div>
                </a>
            </li>
            <li class="menu-item-has-children">
                <a href="{{ route('home.galeri') }}">
                    <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                        <span class="icon-box">
                            <iconify-icon icon="heroicons-outline:calendar">
                            </iconify-icon>
                        </span>
                        <div class="text-box">{{ __('home.title.galeri') }}</div>
                    </div>
                </a>
            </li>
            <li class="menu-item-has-children">
                <a href="{{ route('home.kalender') }}">
                    <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                        <span class="icon-box">
                            <iconify-icon icon="heroicons-outline:calendar">
                            </iconify-icon>
                        </span>
                        <div class="text-box">{{ __('home.title.kalender') }}</div>
                    </div>
                </a>
            </li>
            <li class="menu-item-has-children">
                <a href="{{ route('home.ruangan') }}">
                    <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                        <span class="icon-box">
                            <iconify-icon icon="heroicons-outline:archive-box">
                            </iconify-icon>
                        </span>
                        <div class="text-box">{{ __('home.title.ruangan') }}</div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- End: Sidebar -->
