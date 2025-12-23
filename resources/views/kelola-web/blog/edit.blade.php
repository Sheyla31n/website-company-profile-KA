<x-header-dashboard>
    <x-slot:title>Edit Blog</x-slot:title>
    <x-slot:description>Ubah judul, thumbnail, dan konten artikel</x-slot:description>
</x-header-dashboard>

<div class="max-w-4xl bg-white rounded-xl shadow p-6 mt-6">

    {{-- Alert error --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
            Harap isi data dengan benar.
        </div>
    @endif

    <form action="{{ route('admin.web.blog.update', $article->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-6">

        @csrf
        @method('PUT')

        {{-- HEADER SECTION --}}
        <div class="flex flex-col md:flex-row gap-6 items-start">

            {{-- Thumbnail Preview --}}
            <div class="md:w-1/3">
                <p class="text-sm font-medium mb-2">Thumbnail Saat Ini</p>

                @if ($article->thumbnail)
                    <img src="{{ asset('storage/' . $article->thumbnail) }}"
                        class="h-32 object-contain border rounded-lg shadow bg-gray-50 p-3">
                @else
                    <div
                        class="h-32 flex items-center justify-center
                               border rounded-lg shadow bg-gray-50 p-3
                               text-gray-400 text-sm">
                        Belum ada thumbnail
                    </div>
                @endif
            </div>

            {{-- Right Side --}}
            <div class="md:w-2/3 space-y-4">

                {{-- Judul --}}
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Judul
                    </label>
                    <input type="text" name="title" value="{{ old('title', $article->title) }}"
                        class="w-full border rounded-lg px-3 py-2
                                  focus:ring focus:ring-orange-300"
                        required>
                </div>

                {{-- Upload Thumbnail --}}
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Ganti Thumbnail (opsional)
                    </label>

                    <input type="file" name="thumbnail"
                        class="block w-full text-sm text-gray-600
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-lg file:border-0
                                  file:bg-[#0B2347] file:text-white
                                  hover:file:bg-orange-500 transition">

                    <p class="text-xs text-gray-500 mt-1">
                        JPG / PNG, max 2MB
                    </p>
                </div>

            </div>
        </div>

        {{-- Konten --}}
        <div>
            <label class="block text-sm font-medium mb-1">
                Konten
            </label>
            <textarea name="content" rows="6"
                class="w-full border rounded-lg px-3 py-2
                             focus:ring focus:ring-orange-300" required>{{ old('content', $article->content) }}</textarea>
        </div>

        {{-- Action --}}
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="{{ route('dashboard', ['page' => 'adminWebBlog']) }}"
                class="px-4 py-2 rounded-lg border hover:bg-gray-100 transition">
                Batal
            </a>

            <button type="submit"
                class="px-6 py-2 bg-[#0B2347] text-white rounded-lg
                       hover:bg-orange-500 transition">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>
