@extends('layouts.adminDashboard')

@section('title', 'Payment Detail - ' . $payment->order_id)

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
                    <a href="{{ route('admin.payments.index') }}" class="hover:text-indigo-600">Payment Management</a>
                </li>
                <li class="flex items-center">
                    <svg class="w-3 h-3 mx-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>{{ $payment->order_id }}</span>
                </li>
            </ol>

            <!-- Actions -->
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.payments.index') }}"
                    class="px-3 py-1.5 border text-gray-600 text-sm rounded hover:bg-gray-50">
                    ← Back to List
                </a>
                <button onclick="window.print()"
                    class="px-3 py-1.5 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                    Print
                </button>
            </div>
        </nav>
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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Payment Information -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Payment Overview -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-gray-900">Payment Details</h2>
                    @php
                        $statusColor = match ($payment->status) {
                            'success' => 'bg-green-100 text-green-800 border-green-200',
                            'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                            'failed', 'expired' => 'bg-red-100 text-red-800 border-red-200',
                            default => 'bg-gray-100 text-gray-800 border-gray-200',
                        };
                    @endphp
                    <span class="px-3 py-1 text-sm font-semibold rounded-full border {{ $statusColor }}">
                        {{ ucfirst($payment->status) }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Order ID</label>
                        <p class="text-lg font-mono bg-gray-50 p-2 rounded border">{{ $payment->order_id }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Transaction ID</label>
                        <p class="text-lg font-mono bg-gray-50 p-2 rounded border">
                            {{ $payment->transaction_id ?? 'Not Available' }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                        <p class="text-2xl font-bold text-green-600">
                            Rp {{ number_format($payment->amount, 0, ',', '.') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                        <p class="text-lg capitalize bg-gray-50 p-2 rounded border">
                            {{ str_replace('_', ' ', $payment->payment_type ?? 'Not Specified') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Created At</label>
                        <p class="text-sm text-gray-600">{{ $payment->created_at->format('d M Y, H:i:s') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Payment Time</label>
                        <p class="text-sm text-gray-600">
                            {{ $payment->payment_time ? $payment->payment_time->format('d M Y, H:i:s') : 'Not Completed' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Customer Information -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Customer Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <p class="text-sm text-gray-900">{{ $payment->user->name ?? 'Unknown User' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <p class="text-sm text-gray-900">{{ $payment->user->email ?? 'Unknown Email' }}</p>
                    </div>
                    @if($payment->user && isset($payment->user->phone))
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <p class="text-sm text-gray-900">{{ $payment->user->phone ?? 'Not Provided' }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Payment Timeline -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Payment Timeline</h3>
                <div class="flow-root">
                    <ul class="-mb-8">
                        <li>
                            <div class="relative pb-8">
                                <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></div>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                            <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 1.414L10.586 9.5 8.293 7.207a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5">
                                        <div>
                                            <p class="text-sm text-gray-900 font-medium">Payment Created</p>
                                            <p class="text-sm text-gray-500">{{ $payment->created_at->format('d M Y, H:i:s') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        @if($payment->payment_time)
                        <li>
                            <div class="relative pb-8">
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if($payment->status === 'success')
                                            <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                                <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        @elseif($payment->status === 'failed' || $payment->status === 'expired')
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-yellow-500 flex items-center justify-center ring-8 ring-white">
                                                <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5">
                                        <div>
                                            <p class="text-sm text-gray-900 font-medium">Payment {{ ucfirst($payment->status) }}</p>
                                            <p class="text-sm text-gray-500">{{ $payment->payment_time->format('d M Y, H:i:s') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div class="space-y-6">
            <!-- Status Update -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Update Status</h3>
                <form method="POST" action="{{ route('admin.payments.updateStatus', $payment->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" id="status"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="pending" {{ $payment->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="success" {{ $payment->status === 'success' ? 'selected' : '' }}>Success</option>
                            <option value="failed" {{ $payment->status === 'failed' ? 'selected' : '' }}>Failed</option>
                            <option value="expired" {{ $payment->status === 'expired' ? 'selected' : '' }}>Expired</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="w-full px-4 py-2 bg-indigo-600 text-white text-sm rounded-md hover:bg-indigo-700 transition-colors">
                        Update Status
                    </button>
                </form>
            </div>

            <!-- Payment Gateway Info -->
            @if($payment->transaction_id)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Gateway Information</h3>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Transaction ID</label>
                        <p class="text-sm text-gray-900 font-mono">{{ $payment->transaction_id }}</p>
                    </div>
                    @if($payment->payment_type)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Payment Method</label>
                        <p class="text-sm text-gray-900 capitalize">{{ str_replace('_', ' ', $payment->payment_type) }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-2">
                    <button onclick="refreshPaymentStatus({{ $payment->id }})"
                        class="w-full px-4 py-2 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 transition-colors">
                        🔄 Check Payment Status
                    </button>

                    @if($payment->status === 'pending')
                    <form method="POST" action="{{ route('admin.payments.updateStatus', $payment->id) }}" class="inline-block w-full">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="success">
                        <button type="submit"
                            class="w-full px-4 py-2 bg-green-600 text-white text-sm rounded-md hover:bg-green-700 transition-colors"
                            onclick="return confirm('Are you sure you want to mark this payment as successful?')">
                            ✅ Mark as Success
                        </button>
                    </form>
                    @endif

                    <form method="POST" action="{{ route('admin.payments.destroy', $payment->id) }}"
                        class="inline-block w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full px-4 py-2 bg-red-600 text-white text-sm rounded-md hover:bg-red-700 transition-colors"
                            onclick="return confirm('Are you sure you want to delete this payment record?')">
                            🗑️ Delete Payment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function refreshPaymentStatus(paymentId) {
            // You can implement AJAX call to check payment status from gateway
            alert('Feature to check payment gateway status will be implemented here');

            // Example implementation:
            /*
            fetch(`/admin/payments/${paymentId}/check-status`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Failed to check payment status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error checking payment status');
            });
            */
        }
    </script>
@endsection
