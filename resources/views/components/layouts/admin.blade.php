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
                        title: 'Delete !',
                        text: 'Are you sure you want to delete this data?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc2626',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Show loading
                            Swal.fire({
                                title: 'Deleting...',
                                text: 'Please wait',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                showConfirmButton: false,
                                didOpen: () => {
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

        // Function to initialize action confirmations (approve/reject)
        function initActionConfirmations() {
            const actionForms = document.querySelectorAll('form[data-confirm-action="true"]');

            actionForms.forEach(function(form) {
                if (form.dataset.confirmInitialized === 'true') {
                    return;
                }
                form.dataset.confirmInitialized = 'true';

                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    e.stopImmediatePropagation();

                    const actionType = form.dataset.actionType; // 'approve' or 'reject'
                    const ulasanName = form.dataset.ulasanName;
                    const ulasanSeminar = form.dataset.ulasanSeminar;

                    let title = '';
                    let text = '';
                    let icon = 'question';
                    let confirmButtonColor = '';

                    if (actionType === 'approve') {
                        title = 'Setujui Ulasan?';
                        text =
                            `Anda yakin ingin MENYETUJUI ulasan dari ${ulasanName} untuk seminar ${ulasanSeminar}?`;
                        icon = 'success';
                        confirmButtonColor = '#10B981'; // Green
                    } else if (actionType === 'reject') {
                        title = 'Tolak Ulasan?';
                        text =
                            `Anda yakin ingin MENOLAK ulasan dari ${ulasanName} untuk seminar ${ulasanSeminar}?`;
                        icon = 'warning';
                        confirmButtonColor = '#EF4444'; // Red
                    }

                    Swal.fire({
                        title: title,
                        text: text,
                        icon: icon,
                        showCancelButton: true,
                        confirmButtonColor: confirmButtonColor,
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: 'Memproses...',
                                text: 'Mohon tunggu',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                showConfirmButton: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            // Manually submit the form using fetch to ensure PATCH method is sent
                            const formData = new FormData(form);
                            const actionUrl = form.action;
                            const method = form.method; // This will be POST

                            // Laravel's @method('PATCH') creates a hidden input named _method
                            const spoofedMethod = formData.get('_method') || method;

                            fetch(actionUrl, {
                                    method: spoofedMethod, // Use the spoofed method
                                    body: formData,
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute(
                                            'content')
                                    }
                                })
                                .then(response => response
                            .json()) // Assuming JSON response for success/error
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire('Berhasil!', data.message, 'success').then(
                                        () => {
                                                window.location.reload();
                                            });
                                    } else {
                                        Swal.fire('Gagal!', data.message ||
                                            'Terjadi kesalahan.', 'error');
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire('Error!',
                                        'Terjadi kesalahan jaringan atau server.', 'error');
                                });
                        }
                    });
                });
            });
        }

        // Initialize on DOM ready
        document.addEventListener('DOMContentLoaded', function() {
            initDeleteConfirmations();
            initActionConfirmations();
        });

        // Re-initialize after Livewire navigation
        document.addEventListener('livewire:navigated', function() {
            initDeleteConfirmations();
            initActionConfirmations();
        });

        // Re-initialize after Livewire updates
        document.addEventListener('livewire:load', function() {
            initDeleteConfirmations();
            initActionConfirmations();
        });

        // For Livewire v3
        document.addEventListener('livewire:init', function() {
            initDeleteConfirmations();
            initActionConfirmations();
        });

        // Show success message if present
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('
                        success ') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        // Show error message if present
        @if (session('error'))
            Swal.fire({
                title: 'Error!',
                text: '{{ session('
                        error ') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif

        // Show warning message if present
        @if (session('warning'))
            Swal.fire({
                title: 'Warning!',
                text: '{{ session('
                        warning ') }}',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        @endif

        // Show info message if present
        @if (session('info'))
            Swal.fire({
                title: 'Info!',
                text: '{{ session('
                        info ') }}',
                icon: 'info',
                confirmButtonText: 'OK'
            });
        @endif
    </script>

    @stack('scripts')
</body>

</html>
