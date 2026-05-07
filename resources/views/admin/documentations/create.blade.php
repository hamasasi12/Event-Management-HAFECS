<x-layouts.admin title="Tambah Jejak Pelatihan">
    <livewire:breadcrumb />
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Tambah Jejak Pelatihan</h2>

        <form action="{{ route('admin.documentations.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
            @csrf
            
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Pelatihan</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
            </div>

            <div class="mb-6">
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal / Keterangan Waktu</label>
                <input type="text" id="date" name="date" value="{{ old('date') }}" placeholder="Contoh: 28 Juli - 1 Agustus 2025" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Singkat</label>
                <textarea id="description" name="description" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-6">
                <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Berita / Detail (Opsional)</label>
                <input type="url" id="link" name="link" value="{{ old('link') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            </div>

            <div class="mb-6">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Pelatihan</label>
                <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Data</button>
            <a href="{{ route('admin.documentations.index') }}" class="ml-2 text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:text-white dark:hover:bg-gray-700">Kembali</a>
        </form>
    </div>
</div>
</x-layouts.admin>
