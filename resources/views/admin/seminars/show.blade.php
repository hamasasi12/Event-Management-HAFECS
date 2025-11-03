<x-layouts.admin title="View Seminar">
    <!-- Breadcrumb -->
    <livewire:breadcrumb :page-title="'Show Seminar '" :breadcrumbs="[
        ['title' => 'Manage Seminar', 'url' => route('admin.seminars.index')],
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
    ]" />


    <div class="bg-white shadow overflow-hidden rounded-lg dark:bg-gray-800">
        <div class="px-4 py-5 sm:px-6">
            <div class="flex justify-between items-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                    {{ $seminar->title }}
                </h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.seminars.edit', $seminar) }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:text-indigo-300 dark:bg-indigo-900/30 dark:hover:bg-indigo-900/50">
                        Edit
                    </a>
                    <form action="{{ route('admin.seminars.destroy', $seminar) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this seminar?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:text-red-300 dark:bg-red-900/30 dark:hover:bg-red-900/50">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">
                Details and information about this seminar.
            </p>
        </div>
        <div class="border-t border-gray-200 dark:border-gray-700">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-700">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Title
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-white">
                        {{ $seminar->title }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Description
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-300">
                        {{ $seminar->description }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-700">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Start Time
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-white">
                        {{ $seminar->start_time->format('d M Y H:i') }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        End Time
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-300">
                        {{ $seminar->end_time->format('d M Y H:i') }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-700">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Price
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-white">
                        Rp {{ number_format($seminar->price, 0, ',', '.') }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Trainer
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-white">
                        {{ $seminar->trainer->name ?? '-' }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Status
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if($seminar->status == 'upcoming')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                            Upcoming
                        </span>
                        @elseif($seminar->status == 'active')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                            Active
                        </span>
                        @elseif($seminar->status == 'completed')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                            Completed
                        </span>
                        @elseif($seminar->status == 'cancelled')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300">
                            Cancelled
                        </span>
                        @endif
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-700">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Image
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if($seminar->image_url)
                        <img src="{{ $seminar->image_url }}" alt="{{ $seminar->title }}" class="h-32 w-32 object-cover rounded-md">
                        @else
                        <span class="text-gray-500 dark:text-gray-400">No image</span>
                        @endif
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Registrations
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-300">
                        {{ $seminar->registrations->count() }} registrations
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</x-layouts.admin>
