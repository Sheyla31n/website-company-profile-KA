<x-header-dashboard>
    <x-slot:title>Tambah Course</x-slot:title>
    <x-slot:description>Tambahkan course baru</x-slot:description>
</x-header-dashboard>

<div class="max-w-3xl bg-white rounded-xl shadow p-6 ">

    <form action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-xl space-y-5">

        @csrf

        {{-- Title --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Nama Course</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- Category --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Kategori</label>
            <select name="category_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Icon --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Icon</label>
            <input type="file" name="icon"
                class="block w-full text-sm text-gray-600
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-lg file:border-0
                   file:bg-[#0B2347] file:text-white
                   hover:file:bg-orange-500 transition">
        </div>

        {{-- Action --}}
        <div class=" flex justify-end gap-3 pt-4 mt-3 border-t">
            <a href="{{ route('dashboard', ['page' => 'adminCourse']) }}" class="px-6 py-2 border rounded">
                Batal
            </a>

            <button type="submit" class="px-6 py-2 bg-[#0B2347] text-white rounded-lg hover:bg-orange-500 transition">
                Simpan
            </button>
        </div>
</div>
</form>
</div>
