<x-header-dashboard>
    <x-slot:title>Edit Review</x-slot:title>
    <x-slot:description>Ubah nama, rating, dan komentar review</x-slot:description>
</x-header-dashboard>

<div class="max-w-4xl bg-white rounded-xl shadow p-6 mt-6">

    {{-- Alert error --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
            Harap isi data dengan benar.
        </div>
    @endif

    <form action="{{ route('admin.web.review.update', $review->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-6">

        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block text-sm font-medium mb-1">
                Nama
            </label>
            <input type="text" name="name" value="{{ old('name', $review->name) }}"
                class="w-full border rounded-lg px-3 py-2
                       focus:ring focus:ring-orange-300">
        </div>

        {{-- Rating dan Komentar --}}
        <div class="flex-1">
            <label class="block text-sm font-medium mb-1">
                Rating
            </label>
            <input type="number" name="stars" value="{{ old('stars', $review->stars) }}" min="1"
                max="5"
                class="w-full border rounded-lg px-3 py-2
                           focus:ring focus:ring-orange-300">
        </div>

        <div class="flex-1">
            <label class="block text-sm font-medium mb-1">
                Komentar
            </label>
            <textarea name="content" rows="4"
                class="w-full border rounded-lg px-3 py-2
                           focus:ring focus:ring-orange-300">{{ old('content', $review->content) }}</textarea>
        </div>

        {{-- Action --}}
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="{{ route('admin.web.course', ['tab' => 'review']) }}"
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
