<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'HAFECS Seminar Registration' }}</title>
    @vite('resources/css/app.css')
    @include('sweetalert::alert')
    @livewireStyles

</head>
<body>
    <div class="min-h-screen bg-gray-100">
        {{ $slot }}
    </div>
    @livewireScripts
</body>
@include('sweetalert::alert')

    <!-- Script untuk menangani SweetAlert dari Livewire events -->
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('show-success', (event) => {
                Swal.fire({
                    title: event.title,
                    text: event.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    // Redirect jika redirectTo diberikan dan bukan null/undefined
                    if (event.redirectTo && event.redirectTo !== null) {
                        if (event.redirectTo.startsWith('http')) {
                            window.location.href = event.redirectTo;
                        } else {
                            // Jika tidak dimulai dengan '/', tambahkan
                            const path = event.redirectTo.startsWith('/') ? event.redirectTo : '/' + event.redirectTo;
                            window.location.href = path;
                        }
                    }
                });
            });

            Livewire.on('show-error', (event) => {
                Swal.fire({
                    title: event.title,
                    text: event.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    // Redirect hanya jika redirectTo diberikan dan bukan null/undefined
                    if (event.redirectTo && event.redirectTo !== null) {
                        if (event.redirectTo.startsWith('http')) {
                            window.location.href = event.redirectTo;
                        } else {
                            // Jika tidak dimulai dengan '/', tambahkan
                            const path = event.redirectTo.startsWith('/') ? event.redirectTo : '/' + event.redirectTo;
                            window.location.href = path;
                        }
                    }
                });
            });
        });
    </script>
</html>
