<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'" class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0">
    <!-- SIDEBAR HEADER -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'" class="flex items-center gap-2 pt-8 sidebar-header pb-7">
        <a href="{{ url('/admin') }}" wire:navigate.hover>
            {{-- <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                <img class="dark:hidden" src="{{ asset('images/logo/logo.svg') }}" alt="Logo" />
            <img class="hidden dark:block" src="{{ asset('images/logo/logo-dark.svg') }}" alt="Logo" />
            </span> --}}

            {{-- <img class="logo-icon" :class="sidebarToggle ? 'lg:block' : 'hidden'" src="{{ asset('images/logo/logo-icon.svg') }}" alt="Logo" /> --}}
        </a>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
        <!-- Sidebar Menu -->
        <nav>
            <div>
                <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
                    <span class="menu-group-title" :class="sidebarToggle ? 'lg:hidden' : ''">
                        MENU
                    </span>

                    <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'" class="mx-auto fill-current menu-group-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z" fill="" />
                    </svg>
                </h3>

                @php
                $isActive = $activeRoute === 'admin.dashboard';
                @endphp


                <ul class="flex flex-col gap-2 mb-6">
                    <!-- Menu Item Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="group relative flex items-center gap-3 px-4 py-3 font-medium rounded-xl hover:bg-gray-200 text-sm transition-all duration-300 ease-in-out
                           {{ Request::routeIs('admin.dashboard') ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700 dark:text-gray-300 dark:hover:bg-blue-500/10 dark:hover:text-blue-400 ' }}" wire:navigate.hover>

                            <svg class="fill-black {{ $isActive ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z" fill="" />
                            </svg>



                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <!-- Menu Item Pendaftar-->

                    @php
                    $isActive = $activeRoute === 'admin.seminar_registration.index';
                    @endphp
                    <li>
                        <a href="{{ route('admin.seminar_registration.index') }}" class="group relative flex items-center gap-3 px-4 py-3 font-medium rounded-xl hover:bg-gray-200 text-sm transition-all duration-300 ease-in-out
                           {{ Request::routeIs('admin.seminar_registration.index') ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700 dark:text-gray-300 dark:hover:bg-blue-500/10 dark:hover:text-blue-400' }}" wire:navigate.hover>


                            <svg class="transition-all duration-300 {{ $isActive ? 'fill-white' : 'fill-gray-500 group-hover:fill-blue-600 dark:fill-gray-400 dark:group-hover:fill-blue-400' }}" width="24" height="24" viewBox="0 0 24 24" fill="none" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Pendaftar
                            </span>

                            <div x-show="page === 'pendaftaran'" class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        </a>
                    </li>


                    <!-- Menu Item Trainer -->
                    @php
                    $isActive = request()->routeIs('admin.trainers.*');
                    @endphp
                    <li>
                        <a href="{{ route('admin.trainers.index') }}" class="group relative flex items-center gap-3 px-4 py-3 font-medium rounded-xl hover:bg-gray-200 text-sm transition-all duration-300 ease-in-out
                           {{ Request::routeIs('admin.trainers.*') ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700 dark:text-gray-300 dark:hover:bg-blue-500/10 dark:hover:text-blue-400' }}" wire:navigate.hover>



                            <svg class="transition-all duration-300 {{ $isActive ? 'fill-white' : 'fill-gray-500 group-hover:fill-blue-600 dark:fill-gray-400 dark:group-hover:fill-blue-400' }}" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 5.69 3.117.75.75 0 0 1-.88.918A4.987 4.987 0 0 0 12 14.25a4.987 4.987 0 0 0-4.81.785.75.75 0 0 1-.88-.918ZM8.25 18a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM15.75 18a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" clip-rule="evenodd" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Trainer
                            </span>

                            <div x-show="page === 'trainer'" class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        </a>
                    </li>

                    <!-- Menu Item Seminar -->
                    @php
                    $isActive = request()->routeIs('admin.seminars.*');
                    @endphp
                    <li>
                        <a href="{{ route('admin.seminars.index') }}" class="group relative flex items-center gap-3 px-4 py-3 font-medium rounded-xl hover:bg-gray-200 text-sm transition-all duration-300 ease-in-out
                           {{ Request::routeIs('admin.seminars.*') ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700 dark:text-gray-300 dark:hover:bg-blue-500/10 dark:hover:text-blue-400' }}" wire:navigate.hover>



                            <svg class="transition-all duration-300 {{ $isActive ? 'fill-white' : 'fill-gray-500 group-hover:fill-blue-600 dark:fill-gray-400 dark:group-hover:fill-blue-400' }}" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 4H18V2H16V4H8V2H6V4H5C3.89 4 3.01 4.9 3.01 6L3 20C3 21.1 3.89 22 5 22H19C20.11 22 21 21.1 21 20V6C21 4.9 20.11 4 19 4ZM19 20H5V9H19V20ZM19 7H5V6H19V7Z"/>
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Webinar
                            </span>

                            <div x-show="page === 'seminar'" class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        </a>
                    </li>

                    @php
                    $isActive = request()->routeIs('admin.attendance.*');
                    @endphp
                    <li>
                        <a href="{{ route('admin.attendance.index') }}" class="group relative flex items-center gap-3 px-4 py-3 font-medium rounded-xl hover:bg-gray-200 text-sm transition-all duration-300 ease-in-out
                           {{ Request::routeIs('admin.attendance.*') ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700 dark:text-gray-300 dark:hover:bg-blue-500/10 dark:hover:text-blue-400' }}" wire:navigate.hover>



                            <svg class="transition-all duration-300 {{ $isActive ? 'fill-white' : 'fill-gray-500 group-hover:fill-blue-600 dark:fill-gray-400 dark:group-hover:fill-blue-400' }}" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 7H13V9H11V7ZM11 11H13V13H11V11ZM11 15H13V17H11V15ZM7.5 4.5H16.5C17.3284 4.5 18 5.17157 18 6V18C18 18.8284 17.3284 19.5 16.5 19.5H7.5C6.67157 19.5 6 18.8284 6 18V6C6 5.17157 6.67157 4.5 7.5 4.5ZM7.5 3C5.84315 3 4.5 4.34315 4.5 6V18C4.5 19.6569 5.84315 21 7.5 21H16.5C18.1569 21 19.5 19.6569 19.5 18V6C19.5 4.34315 18.1569 3 16.5 3H7.5Z"/>
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Absensi
                            </span>

                            <div x-show="page === 'attendance'" class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        </a>
                    </li>
                    @php
                    $isActive = request()->routeIs('admin.ulasan*');
                    @endphp
                    <li>
                        <a href="{{ route('admin.ulasan.index') }}" class="group relative flex items-center gap-3 px-4 py-3 font-medium rounded-xl hover:bg-gray-200 text-sm transition-all duration-300 ease-in-out
                           {{ Request::routeIs('admin.ulasan*') ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700 dark:text-gray-300 dark:hover:bg-blue-500/10 dark:hover:text-blue-400' }}" wire:navigate.hover>
                            <svg class="transition-all duration-300 {{ $isActive ? 'fill-white' : 'fill-gray-500 group-hover:fill-blue-600 dark:fill-gray-400 dark:group-hover:fill-blue-400' }}" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Ulasan
                            </span>

                            <div x-show="page === 'attendance'" class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        </a>
                    </li>
                    @php
                    $isActive = request()->routeIs('admin.settings.*');
                    @endphp
                    <li>
                        <a href="{{ route('admin.settings.edit') }}" class="group relative flex items-center gap-3 px-4 py-3 font-medium rounded-xl hover:bg-gray-200 text-sm transition-all duration-300 ease-in-out
                           {{ Request::routeIs('admin.settings.*') ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700 dark:text-gray-300 dark:hover:bg-blue-500/10 dark:hover:text-blue-400' }}" wire:navigate.hover>
                            <svg class="transition-all duration-300 {{ $isActive ? 'fill-white' : 'fill-gray-500 group-hover:fill-blue-600 dark:fill-gray-400 dark:group-hover:fill-blue-400' }}" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.06-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.73,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.06,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.43-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.49-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/>
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Settings
                            </span>
                        </a>
                    </li>
                    
                    @php
                    $isActive = request()->routeIs('admin.documentations.*');
                    @endphp
                    <li>
                        <a href="{{ route('admin.documentations.index') }}" class="group relative flex items-center gap-3 px-4 py-3 font-medium rounded-xl hover:bg-gray-200 text-sm transition-all duration-300 ease-in-out
                           {{ Request::routeIs('admin.documentations.*') ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700 dark:text-gray-300 dark:hover:bg-blue-500/10 dark:hover:text-blue-400' }}" wire:navigate.hover>
                            <svg class="transition-all duration-300 {{ $isActive ? 'fill-white' : 'fill-gray-500 group-hover:fill-blue-600 dark:fill-gray-400 dark:group-hover:fill-blue-400' }}" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 4H3C1.9 4 1 4.9 1 6V18C1 19.1 1.9 20 3 20H21C22.1 20 23 19.1 23 18V6C23 4.9 22.1 4 21 4ZM21 18H3V6H21V18ZM8.5 13.5L11 16.5L14.5 12L19 18H5L8.5 13.5Z"/>
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Jejak Pelatihan
                            </span>
                        </a>
                    </li>

                    <!-- Menu Item Pesan -->
                    <!-- @php
                    $isActive = $activeRoute === 'admin.messages.index';
                    @endphp -->
                    <!-- <li>
                        <a href="{{ route('admin.messages.index') }}" class="group relative flex items-center gap-3 px-4 py-3 font-medium rounded-xl hover:bg-gray-200 text-sm transition-all duration-300 ease-in-out
                           {{ Request::routeIs('admin.messages.index') ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700 dark:text-gray-300 dark:hover:bg-blue-500/10 dark:hover:text-blue-400' }}" wire:navigate.hover>

                            <svg class="transition-all duration-300 {{ $isActive ? 'fill-white' : 'fill-gray-500 group-hover:fill-blue-600 dark:fill-gray-400 dark:group-hover:fill-blue-400' }}" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 4H4C2.9 4 2.01 4.9 2.01 6L2 18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4ZM20 8L12 13L4 8V6L12 11L20 6V8Z" fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Pesan
                            </span>
                        </a>
                    </li> -->
                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->

</aside>
