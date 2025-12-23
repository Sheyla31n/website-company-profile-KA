<x-header-dashboard>
    <x-slot:title>Edit Course</x-slot:title>
    <x-slot:description>Perbarui data course</x-slot:description>
</x-header-dashboard>

<div class="max-w-3xl bg-white rounded-xl shadow p-6">

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.course.update', $course->id) }}" method="POST" enctype="multipart/form-data"
        class="max-w-xl space-y-5">

        @csrf
        @method('PUT')

        {{-- Title --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Nama Course</label>
            <input type="text" name="title" value="{{ old('title', $course->title) }}"
                class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- Category --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Kategori</label>
            <select name="category_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Icon --}}
        <div class="flex flex-col md:flex-row gap-6 items-start">
            <div class="md:w-1/3">
                <label class="block text-sm font-semibold mb-1">Icon</label>

                {{-- preview icon lama --}}
                @if ($course->icon)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $course->icon) }}" alt="Icon Course"
                            class="h-32 object-contain border rounded">
                    </div>
                @endif
            </div>

            <div class="md:w-2/3 mt-5">
                <input type="file" name="icon"
                    class="block w-full text-sm text-gray-600
                       file:mr-4 file:py-2 file:px-4
                       file:rounded-lg file:border-0
                       file:bg-[#0B2347] file:text-white
                       hover:file:bg-orange-500 transition">

                <p class="text-xs text-gray-500 mt-1">
                    Kosongkan jika tidak ingin mengganti icon
                </p>
            </div>
        </div>

        {{-- Action --}}
        <div class="flex justify-end gap-3 pt-4 mt-3 border-t">
            <a href="{{ route('dashboard', ['page' => 'adminCourse']) }}" class="px-6 py-2 border rounded">
                Batal
            </a>

            <button type="submit" class="px-6 py-2 bg-[#0B2347] text-white rounded-lg hover:bg-orange-500 transition">
                Simpan
            </button>
        </div>

    </form>
</div>
