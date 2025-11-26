<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'HAFECS Seminar Registration' }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles

</head>
<body>
    <div class="min-h-screen bg-gray-100">
        {{ $slot }}
    </div>
    @livewireScripts
</body>

    <!-- Script untuk menangani SweetAlert dari Livewire events -->
    <script>
        Livewire.on('show-success', ({title, message, redirectTo}) => {
            Swal.fire({
                title,
                text: message,
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                if (redirectTo) window.location.href = redirectTo;
            });
        });

        Livewire.on('show-error', ({title, message, redirectTo}) => {
            Swal.fire({
                title,
                text: message,
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(() => {
                if (redirectTo) window.location.href = redirectTo;
            });
        });
    </script>
</html>
