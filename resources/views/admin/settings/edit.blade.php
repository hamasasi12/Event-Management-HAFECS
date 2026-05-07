<x-layouts.admin title="Site Settings">
    <!-- Breadcrumb -->
    <livewire:breadcrumb />

    <div class="rounded-sm border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="border-b border-gray-200 py-4 px-6.5 dark:border-gray-700">
            <h3 class="font-medium text-black dark:text-white">
                Site Information
            </h3>
        </div>

        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" class="p-6.5">
            @csrf

            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Site Description (Footer)
                </label>
                <textarea rows="3" name="site_description" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{ old('site_description', $settings['site_description'] ?? 'LPK HAFECS untuk memberdayakan pendidik dengan pengetahuan dan keterampilan mengajar yang efektif.') }}</textarea>
            </div>

            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Site Address (Footer Contact)
                </label>
                <textarea rows="3" name="site_address" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{ old('site_address', $settings['site_address'] ?? 'No Data') }}</textarea>
            </div>

            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Site Email (Footer Contact)
                </label>
                <input type="email" name="site_email" value="{{ old('site_email', $settings['site_email'] ?? 'hafecs@hasnurcentre.org') }}" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4.5">
                <div>
                    <label class="mb-2.5 block text-black dark:text-white">
                        Instagram URL
                    </label>
                    <input type="url" name="site_instagram" value="{{ old('site_instagram', $settings['site_instagram'] ?? '#') }}" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                </div>
                <div>
                    <label class="mb-2.5 block text-black dark:text-white">
                        LinkedIn URL
                    </label>
                    <input type="url" name="site_linkedin" value="{{ old('site_linkedin', $settings['site_linkedin'] ?? '#') }}" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                </div>
                <div>
                    <label class="mb-2.5 block text-black dark:text-white">
                        Facebook URL
                    </label>
                    <input type="url" name="site_facebook" value="{{ old('site_facebook', $settings['site_facebook'] ?? '#') }}" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                </div>
            </div>

            <button type="submit" class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90 bg-blue-600 text-white">
                Save Changes
            </button>
        </form>
    </div>
</x-layouts.admin>


