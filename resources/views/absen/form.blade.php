<!DOCTYPE html>
<html lang="id">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAFECS - Absensi Seminar 2025</title>
    @vite('resources/css/app.css')

<div>
   <header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto px-4 sm:px-6 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="HAFECS Logo" class="h-10">
                </a>
            </div>
            </header>

    <div class="max-w-2xl mx-auto mt-10">
        <div class="bg-white rounded-3xl p-8 shadow-xl border-t-4 border-coral">
            <h2 class="text-2xl font-bold text-primary text-center mb-6">Absensi Seminar</h2>

            <div class="bg-gray-50 rounded-xl p-4 mb-6">
                <h3 class="text-xl font-bold text-primary">{{ $seminar->title }}</h3>
                <p class="text-gray-600 mt-2">{{ $seminar->description }}</p>
                <div class="flex justify-between mt-4">
                    <span class="font-semibold">Tanggal:</span>
                    <span>{{ $seminar->start_time->format('d M Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Waktu:</span>
                    <span>{{ $seminar->start_time->format('H:i') }} - {{ $seminar->end_time->format('H:i') }}</span>
                </div>
            </div>

            @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
            @endif

            <form method="POST" action="{{ route('attend.mark', ['seminar_hashid' => $seminar->hashid, 'token' => $token]) }}" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-coral focus:ring focus:ring-coral focus:ring-opacity-50">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-coral focus:ring focus:ring-coral focus:ring-opacity-50">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                  <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">No. Telp/WhatsApp</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-coral focus:ring focus:ring-coral focus:ring-opacity-50">
                    @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                 <div>
                <label for="jenjang_sekolah" class="block text-sm font-medium text-gray-700">Jenjang Sekolah</label>
                <input type="text" name="jenjang_sekolah" id="jenjang_sekolah"
                    value="{{ old('jenjang_sekolah') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-coral focus:ring focus:ring-coral focus:ring-opacity-50">
                @error('jenjang_sekolah') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                  <div>
                    <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-1">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" id="asal_sekolah" value="{{ old('asal_sekolah') }}" placeholder="Masukkan nama sekolah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 px-3 py-2">
                    @error('asal_sekolah') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="space-y-6">
    <!-- Jabatan -->
    <div>
        <label for="jabatan" class="block text-sm font-medium text-gray-700 mb-1">
            Jabatan<span class="text-red-500">*</span>
        </label>
        <select name="jabatan" id="jabatan" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white px-3 py-2">
            <option value="">Pilih Jabatan</option>
            <option value="kepala_sekolah" {{ old('jabatan') == 'kepala_sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
            <option value="guru" {{ old('jabatan') == 'guru' ? 'selected' : '' }}>Guru</option>
            <option value="pengawas" {{ old('jabatan') == 'pengawas' ? 'selected' : '' }}>Pengawas</option>
            <option value="operator" {{ old('jabatan') == 'operator' ? 'selected' : '' }}>Operator</option>
            <option value="umum" {{ old('jabatan') == 'umum' ? 'selected' : '' }}>Umum</option>
        </select>
        @error('jabatan') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
    </div>
    <!-- Kota/Kabupaten -->
    <div>
        <label for="kota_kabupaten" class="block text-sm font-medium text-gray-700 mb-1">
            Kota/Kabupaten<span class="text-red-500">*</span>
        </label>
        <input type="text" name="kota_kabupaten" id="kota_kabupaten" value="{{ old('kota_kabupaten') }}" placeholder="Masukkan kota/kabupaten" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 px-3 py-2">
        @error('kota_kabupaten') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
    </div>

    <!-- Provinsi -->
    <div>
        <label for="provinsi" class="block text-sm font-medium text-gray-700 mb-1">
            Provinsi<span class="text-red-500">*</span>
        </label>
        <select name="provinsi" id="provinsi" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white px-3 py-2">
            <option value="">Pilih Provinsi</option>
            <option value="aceh" {{ old('provinsi') == 'aceh' ? 'selected' : '' }}>Aceh</option>
            <option value="sumatera_utara" {{ old('provinsi') == 'sumatera_utara' ? 'selected' : '' }}>Sumatera Utara</option>
            <option value="sumatera_barat" {{ old('provinsi') == 'sumatera_barat' ? 'selected' : '' }}>Sumatera Barat</option>
            <option value="riau" {{ old('provinsi') == 'riau' ? 'selected' : '' }}>Riau</option>
            <option value="jambi" {{ old('provinsi') == 'jambi' ? 'selected' : '' }}>Jambi</option>
            <option value="sumatera_selatan" {{ old('provinsi') == 'sumatera_selatan' ? 'selected' : '' }}>Sumatera Selatan</option>
            <option value="bengkulu" {{ old('provinsi') == 'bengkulu' ? 'selected' : '' }}>Bengkulu</option>
            <option value="lampung" {{ old('provinsi') == 'lampung' ? 'selected' : '' }}>Lampung</option>
            <option value="kepulauan_bangka_belitung" {{ old('provinsi') == 'kepulauan_bangka_belitung' ? 'selected' : '' }}>Kepulauan Bangka Belitung</option>
            <option value="kepulauan_riau" {{ old('provinsi') == 'kepulauan_riau' ? 'selected' : '' }}>Kepulauan Riau</option>
            <option value="dki_jakarta" {{ old('provinsi') == 'dki_jakarta' ? 'selected' : '' }}>DKI Jakarta</option>
            <option value="jawa_barat" {{ old('provinsi') == 'jawa_barat' ? 'selected' : '' }}>Jawa Barat</option>
            <option value="jawa_tengah" {{ old('provinsi') == 'jawa_tengah' ? 'selected' : '' }}>Jawa Tengah</option>
            <option value="di_yogyakarta" {{ old('provinsi') == 'di_yogyakarta' ? 'selected' : '' }}>DI Yogyakarta</option>
            <option value="jawa_timur" {{ old('provinsi') == 'jawa_timur' ? 'selected' : '' }}>Jawa Timur</option>
            <option value="banten" {{ old('provinsi') == 'banten' ? 'selected' : '' }}>Banten</option>
            <option value="bali" {{ old('provinsi') == 'bali' ? 'selected' : '' }}>Bali</option>
            <option value="nusa_tenggara_barat" {{ old('provinsi') == 'nusa_tenggara_barat' ? 'selected' : '' }}>Nusa Tenggara Barat</option>
            <option value="nusa_tenggara_timur" {{ old('provinsi') == 'nusa_tenggara_timur' ? 'selected' : '' }}>Nusa Tenggara Timur</option>
            <option value="kalimantan_barat" {{ old('provinsi') == 'kalimantan_barat' ? 'selected' : '' }}>Kalimantan Barat</option>
            <option value="kalimantan_tengah" {{ old('provinsi') == 'kalimantan_tengah' ? 'selected' : '' }}>Kalimantan Tengah</option>
            <option value="kalimantan_selatan" {{ old('provinsi') == 'kalimantan_selatan' ? 'selected' : '' }}>Kalimantan Selatan</option>
            <option value="kalimantan_timur" {{ old('provinsi') == 'kalimantan_timur' ? 'selected' : '' }}>Kalimantan Timur</option>
            <option value="kalimantan_utara" {{ old('provinsi') == 'kalimantan_utara' ? 'selected' : '' }}>Kalimantan Utara</option>
            <option value="sulawesi_utara" {{ old('provinsi') == 'sulawesi_utara' ? 'selected' : '' }}>Sulawesi Utara</option>
            <option value="sulawesi_tengah" {{ old('provinsi') == 'sulawesi_tengah' ? 'selected' : '' }}>Sulawesi Tengah</option>
            <option value="sulawesi_selatan" {{ old('provinsi') == 'sulawesi_selatan' ? 'selected' : '' }}>Sulawesi Selatan</option>
            <option value="sulawesi_tenggara" {{ old('provinsi') == 'sulawesi_tenggara' ? 'selected' : '' }}>Sulawesi Tenggara</option>
            <option value="gorontalo" {{ old('provinsi') == 'gorontalo' ? 'selected' : '' }}>Gorontalo</option>
            <option value="sulawesi_barat" {{ old('provinsi') == 'sulawesi_barat' ? 'selected' : '' }}>Sulawesi Barat</option>
            <option value="maluku" {{ old('provinsi') == 'maluku' ? 'selected' : '' }}>Maluku</option>
            <option value="maluku_utara" {{ old('provinsi') == 'maluku_utara' ? 'selected' : '' }}>Maluku Utara</option>
            <option value="papua_barat" {{ old('provinsi') == 'papua_barat' ? 'selected' : '' }}>Papua Barat</option>
            <option value="papua" {{ old('provinsi') == 'papua' ? 'selected' : '' }}>Papua</option>
        </select>
        @error('provinsi') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
    </div>
</div>
            <div>
                <label for="ulasan" class="block text-sm font-medium text-gray-700 mb-1">
                    Ulasan<span class="text-red-500">*</span>
                </label>
                <textarea
                    name="ulasan"
                    id="ulasan"
                    rows="4"
                    placeholder="Tulis ulasan atau komentar Anda di sini..."
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 px-3 py-2 resize-none"
                >{{ old('ulasan') }}</textarea>
                @error('ulasan')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

                <button type="submit" class="bg-gradient-to-r from-coral to-red-500 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300 w-full">
                    <span>Absen Sekarang</span>
                </button>
            </form>
        </div>
    </div>

</div>
</div>
</div>
