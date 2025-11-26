<x-layouts.admin title="Absensi Seminar">
    <livewire:breadcrumb :page-title="'Manage Absensi'" :breadcrumbs="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
    ]" />
    <div class="bg-white shadow overflow-hidden rounded-lg dark:bg-gray-800">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                Seminar Aktif Hari Ini
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">
                Daftar seminar yang sedang aktif dan dapat dihadiri
            </p>
        </div>
        <div class="border-t border-gray-200 dark:border-gray-700 px-4 py-5 sm:p-6">
            @if($activeSeminars->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($activeSeminars as $seminar)
                <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-700">
                    <div class="p-5">
                        <div class="flex-shrink-0">
                            @if($seminar->image_url)
                            <img src="{{ $seminar->image_url }}" alt="{{ $seminar->title }}" class="w-full h-48 object-cover rounded-md">
                            @else
                            <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-48 flex items-center justify-center">
                                <span class="text-gray-500 dark:text-gray-400">No Image</span>
                            </div>
                            @endif
                        </div>
                        <div class="mt-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                                {{ $seminar->title }}
                            </h3>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                {{ Str::limit($seminar->description, 100) }}
                            </p>
                            <div class="mt-4 space-y-2">
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                    <svg class="mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-1-1H7a1 1 0 00-2 0zm8 0H7v1h5V2z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $seminar->start_time->format('d M Y') }}
                                </div>
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                    <svg class="mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $seminar->start_time->format('H:i') }} - {{ $seminar->end_time->format('H:i') }}
                                </div>
                            </div>
                            <div class="mt-6">
                                <a href="{{ route('admin.attendance.seminar.registrants', ['seminar_hashid' => $seminar->hashid]) }}" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-700 dark:hover:bg-indigo-600">
                                    Lihat Peserta
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Tidak ada seminar aktif saat ini</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Belum ada seminar yang sedang berlangsung hari ini.</p>
            </div>
            @endif
        </div>
    </div>
</x-layouts.admin>
