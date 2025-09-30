<!DOCTYPE html>
<html lang="en" x-data="{
        darkMode: localStorage.getItem('darkMode') === 'true',
        pageName: '{{ $title ?? 'Admin Dashboard' }}',
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
            @include('sweetalert::alert')

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


        // document.addEventListener('DOMContentLoaded', function() {
        //     // Handle delete button clicks
        //     const deleteButtons = document.querySelectorAll('.delete-btn');

        //     deleteButtons.forEach(button => {
        //         button.addEventListener('click', function(e) {
        //             e.preventDefault();

        //             const form = this.closest('.delete-form');

        //             Swal.fire({
        //                 title: 'Are you sure?'
        //                 , text: "You won't be able to revert this!"
        //                 , icon: 'warning'
        //                 , showCancelButton: true
        //                 , confirmButtonColor: '#3085d6'
        //                 , cancelButtonColor: '#d33'
        //                 , confirmButtonText: 'Yes, delete it!'
        //             }).then((result) => {
        //                 if (result.isConfirmed) {
        //                     form.submit();
        //                 }
        //             });
        //         });
        //     });
        // });


        // Show success message if present
        @if(session('success'))
        Swal.fire({
            title: 'Success!'
            , text: '{{ session('
            success ') }}'
            , icon: 'success'
            , confirmButtonText: 'OK'
        });
        @endif

        // Show error message if present
        @if(session('error'))
        Swal.fire({
            title: 'Error!'
            , text: '{{ session('
            error ') }}'
            , icon: 'error'
            , confirmButtonText: 'OK'
        });
        @endif

        // Show warning message if present
        @if(session('warning'))
        Swal.fire({
            title: 'Warning!'
            , text: '{{ session('
            warning ') }}'
            , icon: 'warning'
            , confirmButtonText: 'OK'
        });
        @endif

        // Show info message if present
        @if(session('info'))
        Swal.fire({
            title: 'Info!'
            , text: '{{ session('
            info ') }}'
            , icon: 'info'
            , confirmButtonText: 'OK'
        });
        @endif

    </script>
