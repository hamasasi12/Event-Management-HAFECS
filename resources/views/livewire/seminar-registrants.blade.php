<div>
    <div class="overflow-x-auto" wire:poll>
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Nama</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">No. Telp</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Jenjang Sekolah</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Asal Sekolah</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Jabatan</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Kota/Kabupaten</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Provinsi</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Status</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Tanggal Pendaftaran</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                @if($seminar->registrations->count() > 0)
                @foreach($seminar->registrations as $registration)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                        {{ $registration->user ? $registration->user->name : $registration->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $registration->user ? $registration->user->email : $registration->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $registration->phone }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $registration->jenjang_sekolah ?? '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $registration->asal_sekolah ?? '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $registration->jabatan ? ucwords(str_replace('_', ' ', $registration->jabatan)) : '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $registration->kota_kabupaten ?? '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $registration->provinsi ? ucwords(str_replace('_', ' ', $registration->provinsi)) : '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($registration->attendance_status == 'attended')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                            Hadir
                        </span>
                        @elseif($registration->attendance_status == 'absent')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300">
                            Tidak Hadir
                        </span>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300">
                            Belum Hadir
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $registration->created_at->format('d M Y H:i') }}
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                        Tidak ada peserta terdaftar
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-700">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-300">Total Peserta</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $seminar->registrations->count() }}</p>
        </div>
        @if($seminar->registrations->count() > 0)
        <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-700">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-300">Hadir</p>
            <p class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $seminar->registrations->where('attendance_status', 'attended')->count() }}</p>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-700">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-300">Belum Hadir</p>
            <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">{{ $seminar->registrations->where('attendance_status', '!=', 'attended')->count() }}</p>
        </div>
        @endif
    </div>
</div>
