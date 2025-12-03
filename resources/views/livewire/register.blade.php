<div>
    <!-- Search and Filters -->
    <div class="mb-6 bg-white p-6 rounded-lg shadow dark:bg-gray-800">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Search (Email / Phone)</label>
                <input type="text" wire:model.live="search" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 
                    focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm 
                    dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Seminar</label>
                <input type="text" wire:model.live="seminar" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 
                    focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm 
                    dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Pendaftar</label>
                <input type="text" wire:model.live="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 
                    focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm 
                    dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
        </div>
        <div class="mt-4 flex justify-end space-x-3">
            <button wire:click="resetFilters" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md 
                text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 
                focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 
                dark:text-gray-300 dark:hover:bg-gray-600">
                Reset Filters
            </button>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white shadow overflow-hidden rounded-lg dark:bg-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-300">
                            Seminar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-300">
                            Nama Pendaftar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-300">
                            Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-300">
                            Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-300">
                            Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-300">
                            Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-300">
                            Tanggal Registrasi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @forelse($seminarRegistration as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $item->seminar->title ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $item->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $item->phone }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $item->seminar->type ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $item->is_paid == 'yes' ? 'Sudah Bayar' : '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $item->created_at->translatedFormat('d F Y H:i') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-500 dark:text-gray-400 py-4">
                            Tidak ada data ditemukan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>