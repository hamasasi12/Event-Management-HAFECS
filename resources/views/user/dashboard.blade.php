@extends('layouts.guest')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-8">
            <div class="bg-white p-8 rounded-2xl shadow-xl">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-extrabold text-gray-900">User Dashboard</h1>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-colors text-sm font-semibold">
                            Logout
                        </button>
                    </form>
                </div>
                
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-xl">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-700">
                                Selamat datang, {{ Auth::user()->name }}! Halaman ini masih kosong.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Content here -->
                <div class="mt-8">
                    <div class="h-96 border-4 border-dashed border-gray-200 rounded-2xl flex items-center justify-center">
                        <p class="text-gray-400 font-medium">Dashboard content will be here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
