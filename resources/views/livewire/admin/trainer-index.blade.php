<div>
    <!-- Search Form and Add Button -->
    <div class="mb-4 flex justify-between items-center">
        <div class="flex-grow sm:flex-none">
            <div class="relative">
                <input type="text" wire:model.live="search" placeholder="Search by name or email..."
                       class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.trainers.create') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:navigate.hover>
            Add New Trainer
        </a>
    </div>

    <!-- Trainers Table -->
    <div class="bg-white shadow overflow-hidden rounded-lg dark:bg-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Phone</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Position</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @forelse($trainers as $trainer)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{ $trainer->image_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($trainer->name) }}" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $trainer->name }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $trainer->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $trainer->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $trainer->position }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($trainer->status == 'active')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                                Active
                            </span>
                            @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300">
                                Inactive
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.trainers.show', $trainer->hashid) }}" class="text-indigo-600 hover:text-indigo-900 mr-3 dark:text-indigo-400 dark:hover:text-indigo-300">Show</a>
                            <a href="{{ route('admin.trainers.edit', $trainer->hashid) }}" class="text-indigo-600 hover:text-indigo-900 mr-3 dark:text-indigo-400 dark:hover:text-indigo-300">Edit</a>
                            <form action="{{ route('admin.trainers.destroy', $trainer->hashid) }}" method="POST" class="inline delete-form" data-confirm-delete="true">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500 dark:text-gray-400">
                           Tidak ada data ditemukan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
