@props(['settings'])

<footer class="bg-[#0D3B66] text-white py-16 relative">
    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500"
        aria-hidden="true"></div>

    <div class="container max-w-6xl mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="space-y-4">
                <h2 class="text-2xl font-bold mb-4 pb-3 border-b-2 border-orange-400 inline-block">LPK HAFECS</h2>
                <p class="text-gray-300 leading-relaxed mb-6">{{ $settings['site_description'] ?? 'No Data' }}</p>
                <div class="flex space-x-4">
                    <a href="{{ $settings['site_instagram'] ?? '#' }}" target="_blank" class="text-gray-400 hover:text-orange-400 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="{{ $settings['site_linkedin'] ?? '#' }}" target="_blank" class="text-gray-400 hover:text-orange-400 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
                    </a>
                    <a href="{{ $settings['site_facebook'] ?? '#' }}" target="_blank" class="text-gray-400 hover:text-orange-400 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-8.74h-2.94v-3.403h2.94v-2.511c0-2.91 1.777-4.494 4.376-4.494 1.245 0 2.317.092 2.628.134v3.048l-1.805.001c-1.413 0-1.687.671-1.687 1.656v2.167h3.375l-.44 3.403h-2.935v8.74h6.162c.73 0 1.323-.593 1.323-1.324v-21.351c0-.732-.593-1.325-1.323-1.325z"/></svg>
                    </a>
                </div>
            </div>

            <div class="md:flex md:justify-center">
                <div class="space-y-4">
                    <h2 class="text-2xl font-bold mb-4 pb-3 border-b-2 border-orange-400 inline-block">Tautan
                        Cepat</h2>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-300 hover:text-orange-400 transition-colors duration-300">Tentang
                                LPK HAFECS</a></li>
                        <li><a href="#mentor"
                                class="text-gray-300 hover:text-orange-400 transition-colors duration-300">Trainer</a>
                        </li>
                        <li><a href="#fasilitas"
                                class="text-gray-300 hover:text-orange-400 transition-colors duration-300">Kurikulum</a>
                        </li>
                        <li><a href="#timeline"
                                class="text-gray-300 hover:text-orange-400 transition-colors duration-300">Timeline</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="md:text-right space-y-4">
                <h2 class="text-2xl font-bold mb-4 pb-3 border-b-2 border-orange-400 md:ml-auto md:inline-block">
                    Kontak</h2>
                <address class="not-italic space-y-2">
                    <p class="text-gray-300 md:text-right">{{ $settings['site_address'] ?? 'No Data' }}</p>
                    <p class="text-gray-300 md:text-right">
                        <a href="mailto:{{ $settings['site_email'] ?? 'hafecs@hasnurcentre.org' }}" class="hover:text-orange-400 transition-colors">
                            {{ $settings['site_email'] ?? 'hafecs@hasnurcentre.org' }}
                        </a>
                    </p>
                </address>
            </div>
        </div>

        <div class="mt-16 pt-8 border-t border-gray-500 text-center text-gray-400 text-sm">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p>© 2026 LPK HAFECS Program. All rights reserved.</p>
                <div class="mt-4 md:mt-0">
                    <a href="{{ route('privacy') }}" class="text-gray-400 hover:text-orange-400 mx-2 transition-colors">Kebijakan
                        Privasi</a>
                    <span class="mx-2" aria-hidden="true">|</span>
                    <a href="{{ route('terms') }}" class="text-gray-400 hover:text-orange-400 mx-2 transition-colors">Syarat
                        &amp; Ketentuan</a>
                </div>
            </div>
        </div>
    </div>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/6282366447772?text=Saya%20ingin%20bertanya%20mengenai%20Training%20Anda"
        target="_blank" rel="noopener noreferrer" aria-label="Chat via WhatsApp"
        class="fixed right-4 bottom-4 z-50 flex items-center justify-center w-12 h-12 md:w-14 md:h-14 rounded-full bg-green-500 shadow-xl transform transition duration-150 hover:scale-105 focus:outline-none focus-visible:ring-2 focus-visible:ring-green-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" viewBox="0 0 24 24"
            fill="currentColor" aria-hidden="true">
            <path
                d="M20.52 3.48A11.94 11.94 0 0 0 12 0C5.373 0 .002 5.373.002 12c0 2.116.55 4.177 1.594 6.004L0 24l6.221-1.617A11.944 11.944 0 0 0 12 24c6.627 0 12-5.373 12-12 0-3.192-1.24-6.197-3.48-8.52zM12 21.5c-1.89 0-3.74-.51-5.36-1.47l-.38-.22-3.7.96.98-3.62-.24-.37A9.498 9.498 0 0 1 2.5 12 9.5 9.5 0 1 1 12 21.5zm5.21-7.88c-.29-.14-1.72-.85-1.99-.95-.27-.11-.47-.17-.67.17-.2.34-.77.95-.95 1.15-.18.2-.36.23-.65.08-1.77-.9-2.93-1.6-4.11-3.01-.31-.37.31-.34.91-1.11.1-.14.05-.26-.03-.38-.08-.11-.67-1.62-.92-2.22-.24-.57-.49-.49-.67-.5-.17-.01-.37-.01-.57-.01-.19 0-.5.07-.77.34-.27.27-1.03 1.01-1.03 2.46 0 1.45 1.05 2.86 1.2 3.06.15.2 2.07 3.3 5.02 4.5 2.95 1.19 2.95.79 3.48.74.53-.05 1.72-.7 1.97-1.39.25-.69.25-1.28.18-1.39-.07-.11-.27-.17-.56-.31z" />
        </svg>
    </a>
</footer>
