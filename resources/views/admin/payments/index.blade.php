@extends('layouts.adminDashboard')

@section('title', 'Admin Dashboard - Payment Management')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <!-- Breadcrumb -->
            <ol class="flex items-center space-x-1 text-gray-600">
                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600">Dashboard</a></li>
                <li class="flex items-center">
                    <svg class="w-3 h-3 mx-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>Payment Management</span>
                </li>
            </ol>

            <!-- Search & Info -->
            <div class="flex flex-wrap items-center gap-3">
                <!-- Search -->
                <form action="{{ route('admin.payments.index') }}" method="GET" class="relative">
                    <input type="text" name="search"
                        class="pl-9 pr-3 py-2 rounded-md border border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Search user or order ID..." value="{{ request('search') }}">
                    <div class="absolute left-2.5 top-2 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                        </svg>
                    </div>
                </form>

                <!-- Total Payments Count -->
                <div class="text-gray-600 text-sm">
                    💳 {{ $stats['total_payments'] }} payments
                </div>

                <!-- Revenue Display -->
                <div class="text-green-600 text-sm font-medium">
                    💰 Rp {{ number_format($stats['total_amount'], 0, ',', '.') }}
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.payments.export', request()->query()) }}"
                        class="px-3 py-1.5 border text-gray-600 text-sm rounded hover:bg-gray-50"
                        data-popover-target="popover-export" data-popover-trigger="hover">
                        Export CSV
                    </a>
                    <div class="relative">
                        <button class="p-2 border rounded text-gray-500 hover:bg-gray-100" id="options-menu"
                            aria-expanded="false" aria-haspopup="true">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm">Total Payments</p>
                    <p class="text-2xl font-bold">{{ number_format($stats['total_payments']) }}</p>
                </div>
                <div class="bg-blue-400 bg-opacity-30 rounded-full p-3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm">Success</p>
                    <p class="text-2xl font-bold">{{ number_format($stats['total_success']) }}</p>
                </div>
                <div class="bg-green-400 bg-opacity-30 rounded-full p-3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm">Pending</p>
                    <p class="text-2xl font-bold">{{ number_format($stats['total_pending']) }}</p>
                </div>
                <div class="bg-yellow-400 bg-opacity-30 rounded-full p-3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-red-500 to-red-600 rounded-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-red-100 text-sm">Failed</p>
                    <p class="text-2xl font-bold">{{ number_format($stats['total_failed']) }}</p>
                </div>
                <div class="bg-red-400 bg-opacity-30 rounded-full p-3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Form -->
    <div class="bg-white rounded-lg shadow-sm p-4 mb-4">
        <form method="GET" action="{{ route('admin.payments.index') }}">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
                <div>
                    <select name="status"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>Success</option>
                        <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                        <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Expired</option>
                    </select>
                </div>
                <div>
                    <input type="date" name="date_from"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ request('date_from') }}" placeholder="From Date">
                </div>
                <div>
                    <input type="date" name="date_to"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ request('date_to') }}" placeholder="To Date">
                </div>
                <div>
                    <select name="payment_type"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">All Payment Types</option>
                        <option value="bank_transfer" {{ request('payment_type') == 'bank_transfer' ? 'selected' : '' }}>
                            Bank Transfer</option>
                        <option value="credit_card" {{ request('payment_type') == 'credit_card' ? 'selected' : '' }}>
                            Credit Card</option>
                        <option value="gopay" {{ request('payment_type') == 'gopay' ? 'selected' : '' }}>GoPay</option>
                        <option value="shopeepay" {{ request('payment_type') == 'shopeepay' ? 'selected' : '' }}>ShopeePay
                        </option>
                    </select>
                </div>
                <div class="md:col-span-2 flex gap-2">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white text-sm rounded-md hover:bg-indigo-700 transition-colors">
                        Apply Filter
                    </button>
                    <a href="{{ route('admin.payments.index') }}"
                        class="px-4 py-2 border border-gray-300 text-gray-700 text-sm rounded-md hover:bg-gray-50 transition-colors">
                        Reset
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Success/Error Messages -->
    @if (session('success'))
        <div class="bg-green-50 border border-green-200 rounded-md p-4 mb-4">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <span class="text-green-800">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-50 border border-red-200 rounded-md p-4 mb-4">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-red-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
                <span class="text-red-800">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <!-- Payments Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-indigo-600 to-blue-500">
                    <tr>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Order ID
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            User
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Amount
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Payment Type
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Payment Time
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($payments as $index => $payment)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <!-- Row Number -->
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index + 1 + ($payments->currentPage() - 1) * $payments->perPage() }}
                            </td>

                            <!-- Order ID -->
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div>
                                        <div class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                                            <a href="{{ route('admin.payments.show', $payment->id) }}">
                                                {{ $payment->order_id }}
                                            </a>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $payment->created_at->format('d M Y, H:i') }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- User Info -->
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $payment->user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $payment->user->email }}</div>
                                </div>
                            </td>

                            <!-- Amount -->
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm font-semibold text-gray-900">
                                    Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                </div>
                            </td>

                            <!-- Status -->
                            <td class="px-4 py-3 whitespace-nowrap">
                                @php
                                    $statusColor = match ($payment->status) {
                                        'success' => 'bg-green-100 text-green-800',
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'failed', 'expired' => 'bg-red-100 text-red-800',
                                        default => 'bg-gray-100 text-gray-800',
                                    };
                                @endphp
                                <span
                                    class="px-2 py-1 inline-flex text-xs font-semibold rounded-full {{ $statusColor }}">
                                    {{ ucfirst($payment->status) }}
                                </span>
                            </td>

                            <!-- Payment Type -->
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                {{ $payment->payment_type ?? '-' }}
                            </td>

                            <!-- Payment Time -->
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $payment->payment_time ? $payment->payment_time->format('d M Y, H:i') : '-' }}
                            </td>

                            <!-- Actions -->
                            {{-- <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.payments.show', $payment->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">View</a>
                            </td> --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.payments.show', $payment->id) }}"
                                    class="inline-flex items-center px-3 py-1.5 bg-indigo-600 text-white text-xs font-medium rounded-md hover:bg-indigo-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-6 text-center text-sm text-gray-500">
                                Tidak ada data pembayaran ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t bg-gray-50">
            {{ $payments->withQueryString()->links() }}
        </div>
    </div>
@endsection
