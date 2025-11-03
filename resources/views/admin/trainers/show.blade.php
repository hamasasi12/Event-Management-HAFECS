<x-layouts.admin title="View Trainer">
    <!-- Breadcrumb -->
    <livewire:breadcrumb :page-title="'View Trainer'" :breadcrumbs="[
        ['title' => 'Manage Trainers', 'url' => route('admin.trainers.index')],
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
    ]" />

    <div class="bg-white shadow overflow-hidden rounded-lg dark:bg-gray-800">
        <div class="px-4 py-5 sm:px-6">
            <div class="flex justify-between items-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                    {{ $trainer->name }}
                </h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.trainers.edit', $trainer) }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:text-indigo-300 dark:bg-indigo-900/30 dark:hover:bg-indigo-900/50">
                        Edit
                    </a>
                    <form action="{{ route('admin.trainers.destroy', $trainer) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this trainer?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:text-red-300 dark:bg-red-900/30 dark:hover:bg-red-900/50">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">
                Details and information about this trainer.
            </p>
        </div>
        <div class="border-t border-gray-200 dark:border-gray-700">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-700">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Image
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if($trainer->image_url)
                        <img src="{{ $trainer->image_url }}" alt="{{ $trainer->name }}" class="h-32 w-32 object-cover rounded-md">
                        @else
                        <span class="text-gray-500 dark:text-gray-400">No image</span>
                        @endif
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Name
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-white">
                        {{ $trainer->name }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-700">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Email
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-white">
                        {{ $trainer->email }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Phone
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-white">
                        {{ $trainer->phone }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-700">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Position
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-white">
                        {{ $trainer->position }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Bio
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-300">
                        {{ $trainer->bio }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-700">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Skills
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-white">
                        @if(is_array($trainer->skills) && count($trainer->skills) > 0)
                            @foreach($trainer->skills as $skill)
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 dark:bg-gray-600 dark:text-gray-200">{{ $skill }}</span>
                            @endforeach
                        @else
                            -
                        @endif
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Status
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if($trainer->status == 'active')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                            Active
                        </span>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300">
                            Inactive
                        </span>
                        @endif
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</x-layouts.admin>
