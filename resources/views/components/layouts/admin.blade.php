<!DOCTYPE html>
<html lang="en" x-data="{
        darkMode: localStorage.getItem('darkMode') === 'true',
        pageName: '{{ $title ?? 'Admin Dashboard' }}',
        init() {
          if (this.darkMode) {
            document.documentElement.classList.add('dark');
          } else {
            document.documentElement.classList.remove('dark');
          }

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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    @include('sweetalert::alert')

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

        // Function to initialize delete confirmations
        function initDeleteConfirmations() {
            const deleteForms = document.querySelectorAll('form[data-confirm-delete="true"]');

            deleteForms.forEach(function(form) {
                // Skip if already initialized
                if (form.dataset.confirmInitialized === 'true') {
                    return;
                }

                // Mark as initialized
                form.dataset.confirmInitialized = 'true';

                // Add event listener
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    e.stopImmediatePropagation();

                    Swal.fire({
                        title: 'Delete !'
                        , text: 'Are you sure you want to delete this data?'
                        , icon: 'warning'
                        , showCancelButton: true
                        , confirmButtonColor: '#dc2626'
                        , cancelButtonColor: '#6b7280'
                        , confirmButtonText: 'Yes, delete it!'
                        , cancelButtonText: 'Cancel'
                        , reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Show loading
                            Swal.fire({
                                title: 'Deleting...'
                                , text: 'Please wait'
                                , allowOutsideClick: false
                                , allowEscapeKey: false
                                , showConfirmButton: false
                                , didOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            // Remove the event listener to prevent recursion
                            form.removeEventListener('submit', arguments.callee);

                            // Submit form
                            form.submit();
                        }
                    });
                });
            });
        }

        // Initialize on DOM ready
        document.addEventListener('DOMContentLoaded', function() {
            initDeleteConfirmations();
        });

        // Re-initialize after Livewire navigation
        document.addEventListener('livewire:navigated', function() {
            initDeleteConfirmations();
        });

        // Re-initialize after Livewire updates
        document.addEventListener('livewire:load', function() {
            initDeleteConfirmations();
        });

        // For Livewire v3
        document.addEventListener('livewire:init', function() {
            initDeleteConfirmations();
        });

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

    @stack('scripts')
</body>
</html>
