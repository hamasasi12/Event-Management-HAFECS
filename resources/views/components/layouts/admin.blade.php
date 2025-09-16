<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: $persist(false).as('darkMode') }" 
      x-init="
        darkMode = localStorage.getItem('darkMode') === 'true';
        $watch('darkMode', val => localStorage.setItem('darkMode', val));
      " 
      :class="darkMode ? 'dark' : ''">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'HAFECS Admin' }}</title>
    @vite('resources/css/admin.css')
    @livewireStyles
    <style>
        /* Efek hover untuk sidebar */
        .sidebar:hover {
            width: 290px;
        }
        .sidebar:hover .logo {
            display: block;
        }
        .sidebar:hover .logo-icon {
            display: none;
        }
        .sidebar:hover .sidebar-header {
            justify-content: space-between;
        }
        .sidebar:hover .menu-group-title {
            display: block;
        }
        .sidebar:hover .menu-group-icon {
            display: none;
        }
        .sidebar:hover .menu-item-text {
            display: inline;
        }
        .sidebar:hover .menu-item-arrow {
            display: block;
        }
    </style>
</head>
<body x-data="{ sidebarToggle: false }">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @livewire('admin.sidebar')
        
        <!-- Main Content -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <!-- Header -->
            @include('admin.components.header')
            
            <!-- Main Content Area -->
            <main>
                <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    
    @livewireScripts
</body>
</html> 