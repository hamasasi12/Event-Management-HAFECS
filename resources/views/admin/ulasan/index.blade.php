<x-layouts.admin title="Manajemen Ulasan">
    <div x-data="{ modalOpen: false, modalContent: { name: '', seminar: '', ulasan: '' } }">
        <!-- Breadcrumb -->
        <livewire:breadcrumb page-title="Manajemen Ulasan" :breadcrumbs="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ]" />

        <!-- Search and Filters -->
        <div class="mb-6 bg-white p-6 rounded-lg shadow dark:bg-gray-800">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Search</label>
                    <input type="text" name="search" id="search" placeholder="Cari berdasarkan nama, email, atau seminar..."
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="">Semua</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Diterima</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Ulasan Table -->
        <div class="bg-white shadow overflow-hidden rounded-lg dark:bg-gray-800">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                Peserta
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                Seminar
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                Ulasan
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @forelse($ulasans as $ulasan)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $ulasan->name }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $ulasan->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $ulasan->seminar->title ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 dark:text-white" style="max-width: 300px;">
                                        {{ Str::limit($ulasan->ulasan, 100) }}
                                        @if(strlen($ulasan->ulasan) > 100)
                                            <button type="button" @click="modalOpen = true; modalContent = { name: '{{ $ulasan->name }}', seminar: '{{ $ulasan->seminar->title ?? 'N/A' }}', ulasan: '{{ addslashes($ulasan->ulasan) }}' }" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 text-xs">
                                                Selengkapnya
                                            </button>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @if($ulasan->ulasan_status == 'pending' || $ulasan->ulasan_status == null) bg-yellow-100 text-yellow-800
                                        @elseif($ulasan->ulasan_status == 'approved') bg-green-100 text-green-800
                                        @elseif($ulasan->ulasan_status == 'rejected') bg-red-100 text-red-800
                                        @endif">
                                        {{ ucfirst($ulasan->ulasan_status ?? 'pending') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $ulasan->updated_at ? $ulasan->updated_at->format('d M Y H:i') : '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    @if($ulasan->ulasan_status != 'approved')
                                        <form action="{{ route('admin.ulasan.approve', Vinkla\Hashids\Facades\Hashids::encode($ulasan->id)) }}" method="POST" class="inline"
                                            data-confirm-action="true"
                                            data-action-type="approve"
                                            data-ulasan-name="{{ $ulasan->name }}"
                                            data-ulasan-seminar="{{ $ulasan->seminar->title ?? 'N/A' }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300">Approve</button>
                                        </form>
                                    @endif
                                    @if($ulasan->ulasan_status != 'rejected')
                                        <form action="{{ route('admin.ulasan.reject', Vinkla\Hashids\Facades\Hashids::encode($ulasan->id)) }}" method="POST" class="inline"
                                            data-confirm-action="true"
                                            data-action-type="reject"
                                            data-ulasan-name="{{ $ulasan->name }}"
                                            data-ulasan-seminar="{{ $ulasan->seminar->title ?? 'N/A' }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-3 dark:text-red-400 dark:hover:text-red-300">Reject</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 dark:text-gray-400 py-4">
                                    Tidak ada data ulasan ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="modalOpen" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="modalOpen" @click.away="modalOpen = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div x-show="modalOpen" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full dark:bg-gray-800">
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">
                                    Ulasan Lengkap
                                </h3>
                                <div class="mt-4">
                                    <p class="text-sm text-gray-600 dark:text-gray-300"><strong>Nama:</strong> <span x-text="modalContent.name"></span></p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300"><strong>Seminar:</strong> <span x-text="modalContent.seminar"></span></p>
                                    <hr class="my-3 dark:border-gray-600">
                                    <p class="text-sm text-gray-500 dark:text-gray-400" x-text="modalContent.ulasan"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button @click="modalOpen = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm dark:bg-gray-600 dark:text-gray-200 dark:border-gray-500 dark:hover:bg-gray-500">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
