<x-layouts.admin title="Create Seminar">
    <!-- Breadcrumb -->
    <livewire:breadcrumb :page-title="'Create Seminar '" :breadcrumbs="[
        ['title' => 'Manage Seminar', 'url' => route('admin.seminars.index')],
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
    ]" />

    <div class="bg-white shadow overflow-hidden rounded-lg dark:bg-gray-800">
        <div class="px-4 py-5 sm:p-6">
            <form action="{{ route('admin.seminars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 dark:bg-red-900/20 dark:border-red-700">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400 dark:text-red-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700 dark:text-red-300">
                                <strong>Whoops!</strong> There were some problems with your input.
                            </p>
                            <ul class="mt-2 list-disc list-inside text-sm text-red-700 dark:text-red-300">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('description') }}</textarea>
                    </div>

                    <!-- Start Time -->
                    <div>
                        <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Time</label>
                        <input type="datetime-local" name="start_time" id="start_time" value="{{ old('start_time') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    <!-- End Time -->
                    <div>
                        <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Time</label>
                        <input type="datetime-local" name="end_time" id="end_time" value="{{ old('end_time') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    <!-- type -->
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Seminar</label>
                        <select name="type" id="type" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="gratis" {{ old('type') == 'gratis' ? 'selected' : '' }} class="dark:bg-gray-700 dark:text-white">Gratis</option>
                            <option value="berbayar" {{ old('type') == 'berbayar' ? 'selected' : '' }} class="dark:bg-gray-700 dark:text-white">Berbayar</option>
                            <option value="beramal" {{ old('type') == 'beramal' ? 'selected' : '' }} class="dark:bg-gray-700 dark:text-white">Beramal</option>
                        </select>
                    </div>

                    <!-- Price -->
                    <div id="price-wrapper">
                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price (Rp)</label>
                        <input type="number" name="price" id="price" value="{{ old('price', 0) }}" step="0.01" min="0"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>


                    <!-- Link -->
                    <div>
                        <label for="link" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Link</label>
                        <input type="text" name="link" id="link" value="{{ old('link') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    <!-- Platform -->
                    <div>
                        <label for="platform" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Platform</label>
                        <select name="platform" id="platform" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="">Select Platform</option>
                            <option value="Zoom" {{ old('platform') == 'Zoom' ? 'selected' : '' }}>Zoom</option>
                            <option value="Google Meet" {{ old('platform') == 'Google Meet' ? 'selected' : '' }}>Google Meet</option>
                            <option value="Microsoft Teams" {{ old('platform') == 'Microsoft Teams' ? 'selected' : '' }}>Microsoft Teams</option>
                            <option value="Webex" {{ old('platform') == 'Webex' ? 'selected' : '' }}>Webex</option>
                            <option value="YouTube Live" {{ old('platform') == 'YouTube Live' ? 'selected' : '' }}>YouTube Live</option>
                            <option value="Other" {{ old('platform') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                        <select name="status" id="status" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }} class="dark:bg-gray-700 dark:text-white">Upcoming</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }} class="dark:bg-gray-700 dark:text-white">Active</option>
                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }} class="dark:bg-gray-700 dark:text-white">Completed</option>
                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }} class="dark:bg-gray-700 dark:text-white">Cancelled</option>
                        </select>
                    </div>

                    <!-- Trainer -->
                    <div class="md:col-span-2">
                        <label for="trainer_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Trainer</label>
                        <select name="trainer_id" id="trainer_id" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="">Select a trainer</option>
                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}" {{ old('trainer_id') == $trainer->id ? 'selected' : '' }} class="dark:bg-gray-700 dark:text-white">{{ $trainer->name }}</option>
                            @endforeach
                            <option value="other" {{ old('trainer_id') == 'other' ? 'selected' : '' }} class="dark:bg-gray-700 dark:text-white">Other (Manual Input)</option>
                        </select>
                    </div>

                    <!-- Custom Trainer Name -->
                    <div class="md:col-span-2" id="custom_trainer_wrapper" style="display: none;">
                        <label for="custom_trainer_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Trainer Name (Manual)</label>
                        <input type="text" name="custom_trainer_name" id="custom_trainer_name" value="{{ old('custom_trainer_name') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Enter trainer name">
                    </div>

                    <!-- Materi yang Akan Dibahas -->
                    <div class="md:col-span-2">
                        <label for="materi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Materi yang Akan Dibahas</label>
                        <textarea name="materi" id="materi" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('materi') }}</textarea>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Gunakan format markdown untuk daftar (gunakan tanda * untuk bullet points). Contoh: * Mengenali Batasan Diri (Self-Limitation Awareness)</p>
                    </div>

                    <!-- Image -->
                    <div class="md:col-span-2">
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md dark:border-gray-600">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                    <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 dark:bg-gray-700 dark:text-indigo-400 dark:hover:text-indigo-300">
                                        <span>Upload a file</span>
                                        <input id="image" name="image" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-500">PNG, JPG, GIF up to 2MB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <a href="{{ route('admin.seminars.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600">
                        Cancel
                    </a>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create Seminar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const typeSelect = document.getElementById('type');
    const priceWrapper = document.getElementById('price-wrapper');
    const priceInput = document.getElementById('price');

    function togglePrice() {
        if (typeSelect.value === 'berbayar' || typeSelect.value === 'beramal') {
            priceWrapper.style.display = 'block';
        } else {
            priceWrapper.style.display = 'none';
            priceInput.value = 0;
        }
    }

    togglePrice();            // cek saat halaman pertama kali load (agar old() berfungsi)
    typeSelect.addEventListener('change', togglePrice);

    const trainerSelect = document.getElementById('trainer_id');
    const customTrainerWrapper = document.getElementById('custom_trainer_wrapper');

    function toggleCustomTrainer() {
        if (trainerSelect.value === 'other') {
            customTrainerWrapper.style.display = 'block';
        } else {
            customTrainerWrapper.style.display = 'none';
        }
    }

    toggleCustomTrainer();
    trainerSelect.addEventListener('change', toggleCustomTrainer);
});
</script>

</x-layouts.admin>
