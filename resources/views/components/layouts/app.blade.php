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
</html>
