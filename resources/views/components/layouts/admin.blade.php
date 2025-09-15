<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HAFECS Admin')</title>
    @vite('resources/css/admin.css')
    @livewireStyles
</head>
<body x-data="{ sidebarToggle: false, darkMode: false }" 
      x-init="
        darkMode = localStorage.getItem('darkMode') === 'true';
        $watch('darkMode', val => localStorage.setItem('darkMode', val));
      " 
      :class="darkMode ? 'dark' : ''">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('admin.components.sidebar')
        
        <!-- Main Content -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <!-- Header -->
            @include('admin.components.header')
            
            <!-- Main Content Area -->
            <main>
                <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    
    @livewireScripts
</body>
</html> 