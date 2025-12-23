<x-header-dashboard>
    <x-slot:title>Edit Kategori Course</x-slot:title>
    <x-slot:description>Ubah nama dan icon kategori course</x-slot:description>
</x-header-dashboard>

<div class="max-w-4xl bg-white rounded-xl shadow p-6 mt-6">

    {{-- Alert error --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
            Harap isi data dengan benar.
        </div>
    @endif

    <form action="{{ route('admin.web.course.update', $kategori->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-6">

        @csrf
        @method('PUT')

        {{-- Nama Partner --}}
        <div>
            <label class="block text-sm font-medium mb-1">
                Nama Kategori
            </label>
            <input type="text" name="name" value="{{ old('name', $kategori->name) }}"
                class="w-full border rounded-lg px-3 py-2
                       focus:ring focus:ring-orange-300">
        </div>

        {{-- Icon --}}
        <div class="flex flex-col md:flex-row gap-6 items-start">

            {{-- Preview icon --}}
            <div class="md:w-1/3 justify-items-center">
                <p class="text-sm font-medium mb-2">Icon Saat Ini</p>
                <img src="{{ asset('storage/' . $kategori->icon) }}"
                    class="h-32 w-auto object-contain
                            border rounded-lg shadow bg-gray-50 p-3">
            </div>

            {{-- Upload baru --}}
            <div class="md:w-2/3 mt-5">
                <label class="block text-sm font-medium mb-2">
                    Ganti Icon (opsional)
                </label>

                <input type="file" name="icon"
                    class="block w-full text-sm text-gray-600
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0
                           file:bg-[#0B2347] file:text-white
                           hover:file:bg-orange-500 transition">

                <p class="text-xs text-gray-500 mt-2">
                    Format: JPG, PNG. Max 2MB.
                </p>
            </div>

        </div>

        {{-- Action --}}
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="{{ route('dashboard', ['page' => 'adminWebCourse']) }}"
                class="px-4 py-2 rounded-lg border hover:bg-gray-100 transition">
                Batal
            </a>

            <button type="submit"
                class="px-6 py-2 bg-[#0B2347] text-white rounded-lg
                       hover:bg-orange-500 transition">
                Simpan
            </button>
        </div>

    </form>
</div>
