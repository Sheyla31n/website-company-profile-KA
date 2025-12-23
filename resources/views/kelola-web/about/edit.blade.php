<x-header-dashboard>
    <x-slot:title>Edit About</x-slot:title>
    <x-slot:description>Perbarui deskripsi website</x-slot:description>
</x-header-dashboard>

<div class="max-w-3xl bg-white rounded-xl shadow p-6 mt-6">

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
            Harap isi deskripsi dengan benar.
        </div>
    @endif

    <form action="{{ route('admin.web.about.update') }}" method="POST">
        @csrf
        @method('PUT')

        <textarea name="description" rows="8" class="w-full border rounded-lg p-3 focus:ring focus:ring-orange-300">
            {{ old('description', $about->description) }}
        </textarea>

        <div class="flex justify-end gap-3 mt-4">
            <a href="{{ route('dashboard', ['page' => 'adminWebAbout']) }}"
                class="px-4 py-2 border rounded-lg hover:bg-gray-100">
                Batal
            </a>

            <button class="px-6 py-2 bg-[#0B2347] text-white rounded-lg hover:bg-orange-500">
                Simpan
            </button>
        </div>
    </form>
</div>
