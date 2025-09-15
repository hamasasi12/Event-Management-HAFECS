@extends('components.layouts.admin')

@section('title', 'Admin Dashboard - HAFECS')

@section('content')
<!-- Breadcrumb -->
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Dashboard
    </h2>
    <nav>
        <ol class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
            <li>
                <a class="font-medium" href="{{ url('/admin') }}">Dashboard</a>
            </li>
            <li class="font-medium">/ Home</li>
        </ol>
    </nav>
</div>
<!-- Breadcrumb End -->

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Total Users -->
    <div class="rounded-sm border border-gray-200 bg-white py-6 px-7.5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
            <svg class="h-6 w-6 text-gray-600 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </div>
        <div class="mt-4 flex items-end justify-between">
            <div>
                <h4 class="text-title-md font-bold text-gray-900 dark:text-white">
                    {{ \App\Models\User::count() }}
                </h4>
                <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Total Users</span>
            </div>
        </div>
    </div>

    <!-- Total Seminars -->
    <div class="rounded-sm border border-gray-200 bg-white py-6 px-7.5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
            <svg class="h-6 w-6 text-gray-600 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
        <div class="mt-4 flex items-end justify-between">
            <div>
                <h4 class="text-title-md font-bold text-gray-900 dark:text-white">
                    {{ \App\Models\Seminar::count() }}
                </h4>
                <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Total Seminars</span>
            </div>
        </div>
    </div>

    <!-- Total Registrations -->
    <div class="rounded-sm border border-gray-200 bg-white py-6 px-7.5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
            <svg class="h-6 w-6 text-gray-600 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </div>
        <div class="mt-4 flex items-end justify-between">
            <div>
                <h4 class="text-title-md font-bold text-gray-900 dark:text-white">
                    {{ \App\Models\SeminarRegistration::count() }}
                </h4>
                <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Total Registrations</span>
            </div>
        </div>
    </div>

    <!-- Revenue -->
    <div class="rounded-sm border border-gray-200 bg-white py-6 px-7.5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
            <svg class="h-6 w-6 text-gray-600 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="mt-4 flex items-end justify-between">
            <div>
                <h4 class="text-title-md font-bold text-gray-900 dark:text-white">
                    Rp {{ number_format(\App\Models\Seminar::sum('price'), 0, ',', '.') }}
                </h4>
                <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Total Revenue</span>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Recent Registrations -->
    <div class="rounded-sm border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="border-b border-gray-200 py-4 px-6.5 dark:border-gray-700">
            <h3 class="font-medium text-black dark:text-white">
                Recent Registrations
            </h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 text-left dark:bg-gray-700">
                        <th class="py-4 px-4 font-medium text-gray-900 dark:text-white">User</th>
                        <th class="py-4 px-4 font-medium text-gray-900 dark:text-white">Seminar</th>
                        <th class="py-4 px-4 font-medium text-gray-900 dark:text-white">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\SeminarRegistration::latest()->limit(5)->get() as $registration)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="py-5 px-4">
                            @if($registration->user)
                                <p class="font-medium text-gray-900 dark:text-white">{{ $registration->user->name }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $registration->user->email }}</p>
                            @else
                                <p class="font-medium text-gray-900 dark:text-white">Guest User</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $registration->email }}</p>
                            @endif
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white">{{ $registration->seminar->title }}</p>
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white">{{ $registration->created_at->format('d M Y') }}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 dark:bg-gray-700">
            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-600 dark:text-white dark:border-gray-600">
                View all users
            </a>
        </div>
    </div>

    <!-- Upcoming Seminars -->
    <div class="rounded-sm border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="border-b border-gray-200 py-4 px-6.5 dark:border-gray-700">
            <h3 class="font-medium text-gray-900 dark:text-white">
                Upcoming Seminars
            </h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 text-left dark:bg-gray-700">
                        <th class="py-4 px-4 font-medium text-gray-900 dark:text-white">Title</th>
                        <th class="py-4 px-4 font-medium text-gray-900 dark:text-white">Date</th>
                        <th class="py-4 px-4 font-medium text-gray-900 dark:text-white">Registrations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\Seminar::where('start_time', '>', now())->orderBy('start_time')->limit(5)->get() as $seminar)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="py-5 px-4">
                            <p class="font-medium text-gray-900 dark:text-white">{{ $seminar->title }}</p>
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white">{{ $seminar->start_time->format('d M Y') }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $seminar->start_time->format('H:i') }} - {{ $seminar->end_time->format('H:i') }}</p>
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white">{{ $seminar->registrations->count() }} registrations</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 dark:bg-gray-700">
            <a href="{{ route('admin.seminars.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-600 dark:text-white dark:border-gray-600">
                View all seminars
            </a>
        </div>
    </div>
</div>
@endsection