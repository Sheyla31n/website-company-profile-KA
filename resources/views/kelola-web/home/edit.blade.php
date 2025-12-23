<x-header-dashboard>
    <x-slot:title>Edit Home Slider</x-slot:title>
    <x-slot:description>Ubah gambar slider homepage</x-slot:description>
</x-header-dashboard>

<div class="max-w-3xl bg-white rounded-xl shadow p-6 ">

    {{-- Alert sukses --}}
    @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
            Harap isi data dengan benar.
        </div>
    @endif

    <form action="{{ route('admin.web.home.update', $slider->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-6">

        @csrf
        @method('PUT')


        {{-- Preview + Upload --}}
        <div class="flex flex-col md:flex-row gap-6 items-start">

            {{-- Preview gambar --}}
            <div class="md:w-1/3 justify-items-center">
                <p class="text-sm font-medium mb-2">Gambar Saat Ini</p>
                <img src="{{ asset('storage/' . $slider->image) }}" class="h-50 w-auto rounded-lg shadow border">
            </div>

            {{-- Upload gambar baru --}}
            <div class="md:w-2/3 mt-5">
                <label class="block text-sm font-medium mb-2">
                    Ganti Gambar (opsional)
                </label>

                <input type="file" name="image"
                    class="block w-full text-sm text-gray-600
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-lg file:border-0
                   file:bg-[#0B2347] file:text-white
                   hover:file:bg-orange-500 transition">

                {{-- Action --}}
                <div class=" flex justify-end gap-3 pt-4 mt-3 border-t">
                    <a href="{{ route('dashboard', ['page' => 'adminWebHome']) }}"
                        class="px-4 py-2 rounded-lg border hover:bg-gray-100 transition"> Batal </a>

                    <button type="submit"
                        class="px-6 py-2 bg-[#0B2347] text-white rounded-lg hover:bg-orange-500 transition"> Simpan
                    </button>
                </div>
            </div>

        </div>

    </form>
</div>
