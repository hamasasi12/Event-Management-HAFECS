<x-layouts.admin title="Daftar Peserta - {{ $seminar->title }}">
    <!-- Breadcrumb -->
    <livewire:breadcrumb :page-title="'Daftar Peserta - ' . $seminar->title" :breadcrumbs="[
        ['title' => 'Absensi Seminar', 'url' => route('admin.attendance.index')],
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
    ]" />

    <div class="bg-white shadow overflow-hidden rounded-lg dark:bg-gray-800">
        <div class="px-4 py-5 sm:px-6">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                        Peserta Terdaftar - {{ $seminar->title }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">
                        Daftar peserta yang mendaftar seminar "{{ $seminar->title }}"
                    </p>
                </div>
                @if($seminar->status === 'active')
                <button id="generate-qr-btn" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="showQrModal('{{ $seminar->hashid }}')">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm3 6a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                    </svg>
                    Generate QR Akses
                </button>
                @endif
            </div>
        </div>
        <div class="border-t border-gray-200 dark:border-gray-700 px-4 py-5 sm:p-6">
           <livewire:seminar-registrants :seminar-id="$seminar->id" />
        </div>
    </div>

    <!-- Modal for QR Code (Dihapus dari sini karena menggunakan SweetAlert) -->
@push('scripts')
    <script>
        function showQrModal(seminarHashId) {
            Swal.fire({
                title: 'Loading QR Code...'
                , text: 'Sedang memproses, harap tunggu.'
                , didOpen: () => {
                    Swal.showLoading()
                }
                , showConfirmButton: false
                , allowOutsideClick: false
            });

            // Pastikan URL POST ke route yang benar (admin)
            fetch(`/admin/attendance/seminar/${seminarHashId}/start-presentation`, {
                    method: 'POST'
                    , headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        , 'Content-Type': 'application/json'
                        , 'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        // Jika response bukan 2xx, throw error
                        return response.json().then(errorData => {
                            throw new Error(errorData.message || 'Server responded with an error status.');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    Swal.close(); // Tutup loading modal

                    console.log('Data QR Code dari Server:', data.qr);

                    if (data.success) {
                        // --- FOKUS PERBAIKAN: Memastikan data.qr adalah STRING SVG ---
                        const qrSvgString = String(data.qr);
                        // --- END FOKUS PERBAIKAN ---

                        Swal.fire({
                            title: `QR Code Absensi - ${data.title}`,
                            // Menggunakan qrSvgString yang dijamin sebagai string
                            html: `
                            <div style="display:flex; flex-direction:column; align-items:center;">
                                <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                                    ${qrSvgString}
                                </div>
                                <p class="mt-4 text-gray-600 dark:text-gray-400">Scan QR ini untuk absensi.</p>
                                <div class="mt-3 w-full px-4">
                                    <input type="text" value="${data.link}"
                                        class="w-full px-3 py-2 border rounded text-sm text-gray-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        readonly
                                        onclick="this.select()" />
                                </div>
                                <button onclick="
                                    // Menggunakan document.execCommand('copy') untuk kompatibilitas yang lebih baik
                                    const inputElement = document.createElement('input');
                                    inputElement.value = '${data.link}';
                                    document.body.appendChild(inputElement);
                                    inputElement.select();
                                    document.execCommand('copy');
                                    document.body.removeChild(inputElement);
                                    Swal.fire({icon:'success',title:'Link berhasil dicopy!',timer:1500,showConfirmButton:false});"
                                    class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 text-sm transition duration-150">
                                    Copy Link
                                </button>
                            </div>
                            `
                            , showCloseButton: true
                            , showConfirmButton: false
                            , width: 500
                            , customClass: {
                                popup: 'dark:bg-gray-800'
                            }
                        });

                    } else {
                        Swal.fire('Error', 'Gagal memuat QR code.', 'error');
                    }
                })
                .catch(err => {
                    console.error('Error:', err);
                    Swal.fire('Error', 'Terjadi kesalahan server: ' + err.message, 'error');
                });
        }

    </script>
@endpush
</x-layouts.admin>
