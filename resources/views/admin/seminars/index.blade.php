<x-layouts.admin title="Manage Seminars">
    <!-- Breadcrumb -->
    <livewire:breadcrumb :page-title="'Manage Seminar '" :breadcrumbs="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
    ]" />

    <!-- Search and Filters -->
    <div class="mb-6 bg-white p-6 rounded-lg shadow dark:bg-gray-800">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Search</label>
                <input type="text" name="search" id="search" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                <select id="status" name="status" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="" class="dark:bg-gray-700 dark:text-white">All</option>
                    <option value="active" class="dark:bg-gray-700 dark:text-white">Active</option>
                    <option value="inactive" class="dark:bg-gray-700 dark:text-white">Inactive</option>
                </select>
            </div>
            <div>
                <label for="date_from" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date From</label>
                <input type="date" name="date_from" id="date_from" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label for="date_to" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date To</label>
                <input type="date" name="date_to" id="date_to" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
        </div>
        <div class="mt-4 flex justify-end">
            <button type="button" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Apply Filters
            </button>
            <a href="{{ route('admin.seminars.create') }}" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Add New Seminar
            </a>
        </div>
    </div>

    <!-- Seminars Table -->
    <div class="bg-white shadow overflow-hidden rounded-lg dark:bg-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Date & Time</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Price</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Registrations</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @foreach($seminars as $seminar)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $seminar->title }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($seminar->description, 50) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">{{ $seminar->start_time->format('d M Y') }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $seminar->start_time->format('H:i') }} - {{ $seminar->end_time->format('H:i') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            Rp {{ number_format($seminar->price, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            <a href="{{ route('admin.attendance.seminar.registrants', $seminar) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300" wire:navigate>
                                {{ $seminar->registrations->count() }} registrations
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $seminar->type }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="relative inline-block">
                                @if($seminar->status == 'upcoming')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300 cursor-pointer hover:bg-blue-200 transition" onclick="toggleStatusPopup({{ $seminar->id }}, event)">
                                    Upcoming
                                </span>
                                @elseif($seminar->status == 'active')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 cursor-pointer hover:bg-green-200 transition" onclick="toggleStatusPopup({{ $seminar->id }}, event)">
                                    Active
                                </span>
                                @elseif($seminar->status == 'completed')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 cursor-pointer hover:bg-gray-200 transition" onclick="toggleStatusPopup({{ $seminar->id }}, event)">
                                    Completed
                                </span>
                                @elseif($seminar->status == 'cancelled')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300 cursor-pointer hover:bg-red-200 transition" onclick="toggleStatusPopup({{ $seminar->id }}, event)">
                                    Cancelled
                                </span>
                                @endif
                                <livewire:seminar-status-manager :seminarId="$seminar->id" :wire:key="'status-manager-'.$seminar->id" />
                            </div>
                        </td>


                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.seminars.show', $seminar) }}" class="text-indigo-600 hover:text-indigo-900 mr-3 dark:text-indigo-400 dark:hover:text-indigo-300" wire:navigate>Show</a>
                            <a href="{{ route('admin.seminars.edit', $seminar) }}" class="text-indigo-600 hover:text-indigo-900 mr-3 dark:text-indigo-400 dark:hover:text-indigo-300" wire:navigate>Edit</a>
                            <form action="{{ route('admin.seminars.destroy', $seminar) }}" method="POST" class="inline delete-form" data-confirm-delete="true">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 ">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript to handle status update events -->
    <script>
        function toggleStatusPopup(seminarId, event) {
            Livewire.dispatch('toggleStatusPopup', [seminarId]);
        }

        document.addEventListener('livewire:init', () => {
            Livewire.on('statusUpdated', ({
                message
                , status
                , seminarId
            }) => {
                Swal.fire("Status Updated", message, "success");
                window.location.reload();
            });
        });

    </script>
</x-layouts.admin>
