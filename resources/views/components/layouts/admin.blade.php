<!DOCTYPE html>
<html lang="en" x-data="{
        darkMode: localStorage.getItem('darkMode') === 'true',
        init() {
          // Initialize on page load
          if (this.darkMode) {
            document.documentElement.classList.add('dark');
          } else {
            document.documentElement.classList.remove('dark');
          }
          
          // Watch for changes
          this.$watch('darkMode', val => {
            localStorage.setItem('darkMode', val);
            if (val) {
              document.documentElement.classList.add('dark');
            } else {
              document.documentElement.classList.remove('dark');
            }
          });
        }
      }" :class="darkMode ? 'dark' : ''">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'HAFECS Admin' }}</title>
    @vite('resources/css/admin.css')

    @livewireStyles
</head>
<body x-data="{ sidebarToggle: false }">
    <div class="flex h-screen overflow-hidden bg-gray-50 dark:bg-gray-900">
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
    <script>
        // Ensure dark mode is applied immediately on page load
        (function() {
            const isDark = localStorage.getItem('darkMode') === 'true';
            if (isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>
</body>
</html>
