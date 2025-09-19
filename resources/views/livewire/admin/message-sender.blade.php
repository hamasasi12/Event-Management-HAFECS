<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-lg p-6 dark:bg-gray-800 dark:border-gray-700">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 dark:text-white">Kirim Pesan ke Pendaftar Seminar</h2>

        <!-- Success Message -->
        @if($successMessage)
        <div class="rounded-xl border border-success-500 bg-success-50 p-4 dark:border-success-500/30 dark:bg-success-500/15 mb-4" role="alert">
            <div class="flex items-start gap-3">
                <div class="text-success-500">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.70186 12.0001C3.70186 7.41711 7.41711 3.70186 12.0001 3.70186C16.5831 3.70186 20.2984 7.41711 20.2984 12.0001C20.2984 16.5831 16.5831 20.2984 12.0001 20.2984C7.41711 20.2984 3.70186 16.5831 3.70186 12.0001ZM12.0001 1.90186C6.423 1.90186 1.90186 6.423 1.90186 12.0001C1.90186 17.5772 6.423 22.0984 12.0001 22.0984C17.5772 22.0984 22.0984 17.5772 22.0984 12.0001C22.0984 6.423 17.5772 1.90186 12.0001 1.90186ZM15.6197 10.7395C15.9712 10.388 15.9712 9.81819 15.6197 9.46672C15.2683 9.11525 14.6984 9.11525 14.347 9.46672L11.1894 12.6243L9.6533 11.0883C9.30183 10.7368 8.73198 10.7368 8.38051 11.0883C8.02904 11.4397 8.02904 12.0096 8.38051 12.3611L10.553 14.5335C10.7217 14.7023 10.9507 14.7971 11.1894 14.7971C11.428 14.7971 11.657 14.7023 11.8257 14.5335L15.6197 10.7395Z" fill=""/>
                    </svg>
                </div>
                <div>
                    <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                        Success
                    </h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $successMessage }}
                    </p>
                </div>
            </div>
        </div>
        @endif

        <!-- Error Message -->
        @if($errorMessage)
        <div class="rounded-xl border border-error-500 bg-error-50 p-4 dark:border-error-500/30 dark:bg-error-500/15 mb-4" role="alert">
            <div class="flex items-start gap-3">
                <div class="text-error-500">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0001 1.90186C6.423 1.90186 1.90186 6.423 1.90186 12.0001C1.90186 17.5772 6.423 22.0984 12.0001 22.0984C17.5772 22.0984 22.0984 17.5772 22.0984 12.0001C22.0984 6.423 17.5772 1.90186 12.0001 1.90186ZM12.0001 3.70186C16.5831 3.70186 20.2984 7.41711 20.2984 12.0001C20.2984 16.5831 16.5831 20.2984 12.0001 20.2984C7.41711 20.2984 3.70186 16.5831 3.70186 12.0001C3.70186 7.41711 7.41711 3.70186 12.0001 3.70186ZM9.35355 8.35355C9.15829 8.15829 8.84171 8.15829 8.64645 8.35355C8.45118 8.54882 8.45118 8.8654 8.64645 9.06066L10.5858 11L8.64645 12.9393C8.45118 13.1346 8.45118 13.4512 8.64645 13.6464C8.84171 13.8417 9.15829 13.8417 9.35355 13.6464L11.2929 11.7071L13.2322 13.6464C13.4275 13.8417 13.7441 13.8417 13.9393 13.6464C14.1346 13.4512 14.1346 13.1346 13.9393 12.9393L11.9999 11L13.9393 9.06066C14.1346 8.8654 14.1346 8.54882 13.9393 8.35355C13.7441 8.15829 13.4275 8.15829 13.2322 8.35355L11.2929 10.2929L9.35355 8.35355Z" fill=""/>
                    </svg>
                </div>
                <div>
                    <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                        Error
                    </h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $errorMessage }}
                    </p>
                </div>
            </div>
        </div>
        @endif

        <form wire:submit.prevent="sendMessages">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Pilih Seminar -->
                <div>
                    <label for="seminar" class="block text-sm font-medium text-gray-700 mb-2 dark:text-gray-300">Pilih Seminar</label>
                    <select wire:model="selectedSeminarId" id="seminar" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-blue-500">
                        <option value="" class="dark:bg-gray-700 dark:text-white">-- Pilih Seminar --</option>
                        @foreach($seminars as $seminar)
                        <option value="{{ $seminar->id }}" class="dark:bg-gray-700 dark:text-white">{{ $seminar->title }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Pilih Template -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="template" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Template Pesan</label>
                        <button type="button" wire:click="toggleCustom" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                            {{ $isCustom ? 'Gunakan Template' : 'Custom Pesan' }}
                        </button>
                    </div>
                    @if(!$isCustom)
                    <select wire:model="selectedTemplateId" id="template" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-blue-500">
                        <option value="" class="dark:bg-gray-700 dark:text-white">-- Pilih Template --</option>
                        @foreach($templates as $template)
                        <option value="{{ $template->id }}" class="dark:bg-gray-700 dark:text-white">{{ $template->name }}</option>
                        @endforeach
                    </select>
                    @else
                    <div class="text-sm text-gray-500 dark:text-gray-400">Menggunakan pesan kustom</div>
                    @endif
                </div>
            </div>

            <!-- Subject dan Content -->
            <div class="mb-6">
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2 dark:text-gray-300">Subjek Email</label>
                <input wire:model="customSubject" type="text" id="subject" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500" placeholder="Masukkan subjek email">
            </div>

            <div class="mb-6">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2 dark:text-gray-300">Isi Pesan</label>
                <textarea wire:model="customContent" id="content" rows="10" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500" placeholder="Masukkan isi pesan"></textarea>
                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    <p>Placeholder yang tersedia:</p>
                    <ul class="list-disc list-inside">
                        <li><code class="dark:bg-gray-700 dark:text-gray-300">{{ '{'.'{ $seminar->title }'.'}' }}</code> - Judul seminar</li>
                        <li><code class="dark:bg-gray-700 dark:text-gray-300">{{ '{'.'{ $seminar->start_time->format("d M Y H:i") }'.'}' }}</code> - Waktu mulai seminar</li>
                        <li><code class="dark:bg-gray-700 dark:text-gray-300">{{ '{'.'{ $seminar->link }'.'}' }}</code> - Link seminar</li>
                        <li><code class="dark:bg-gray-700 dark:text-gray-300">{{ '{'.'{ $registration->name }'.'}' }}</code> - Nama pendaftar</li>
                    </ul>
                </div>
            </div>

            <!-- Tombol Kirim -->
            <div class="flex justify-end">
                <button type="submit" 
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-75 cursor-not-allowed"
                        class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center dark:from-blue-600 dark:to-blue-700">
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
