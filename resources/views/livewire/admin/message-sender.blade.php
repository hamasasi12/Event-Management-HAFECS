<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan ke Pendaftar Seminar</h2>

        <!-- Success Message -->
        @if($successMessage)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ $successMessage }}</span>
        </div>
        @endif

        <!-- Error Message -->
        @if($errorMessage)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ $errorMessage }}</span>
        </div>
        @endif

        <form wire:submit.prevent="sendMessages">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Pilih Seminar -->
                <div>
                    <label for="seminar" class="block text-sm font-medium text-gray-700 mb-2">Pilih Seminar</label>
                    <select wire:model="selectedSeminarId" id="seminar" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        <option value="">-- Pilih Seminar --</option>
                        @foreach($seminars as $seminar)
                        <option value="{{ $seminar->id }}">{{ $seminar->title }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Pilih Template -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="template" class="block text-sm font-medium text-gray-700">Template Pesan</label>
                        <button type="button" wire:click="toggleCustom" class="text-sm text-blue-600 hover:text-blue-800">
                            {{ $isCustom ? 'Gunakan Template' : 'Custom Pesan' }}
                        </button>
                    </div>
                    @if(!$isCustom)
                    <select wire:model="selectedTemplateId" id="template" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        <option value="">-- Pilih Template --</option>
                        @foreach($templates as $template)
                        <option value="{{ $template->id }}">{{ $template->name }}</option>
                        @endforeach
                    </select>
                    @else
                    <div class="text-sm text-gray-500">Menggunakan pesan kustom</div>
                    @endif
                </div>
            </div>

            <!-- Subject dan Content -->
            <div class="mb-6">
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek Email</label>
                <input wire:model="customSubject" type="text" id="subject" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Masukkan subjek email">
            </div>

            <div class="mb-6">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Isi Pesan</label>
                <textarea wire:model="customContent" id="content" rows="10" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Masukkan isi pesan"></textarea>
                <div class="mt-2 text-sm text-gray-500">
                    <p>Placeholder yang tersedia:</p>
                    <ul class="list-disc list-inside">
                        <li><code>{{ '{'.'{ $seminar->title }'.'}' }}</code> - Judul seminar</li>
                        <li><code>{{ '{'.'{ $seminar->start_time->format("d M Y H:i") }'.'}' }}</code> - Waktu mulai seminar</li>
                        <li><code>{{ '{'.'{ $seminar->link }'.'}' }}</code> - Link seminar</li>
                        <li><code>{{ '{'.'{ $registration->name }'.'}' }}</code> - Nama pendaftar</li>
                    </ul>
                </div>
            </div>

            <!-- Tombol Kirim -->
            <div class="flex justify-end">
                <button type="submit" 
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-75 cursor-not-allowed"
                        class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center">
                    <span wire:loading.remove>Kirim Pesan</span>
                    <span wire:loading>
                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Mengirim...
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
