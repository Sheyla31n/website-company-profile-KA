<x-header-dashboard>
    <x-slot:title>Tambah Partner</x-slot:title>
    <x-slot:description>Tambahkan partner baru</x-slot:description>
</x-header-dashboard>

<div class="max-w-4xl bg-white rounded-xl shadow p-6 mt-6">

    {{-- Alert error --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
            Harap isi data dengan benar.
        </div>
    @endif

    <form action="{{ route('admin.web.partner.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">

        @csrf

        {{-- Nama Partner --}}
        <div>
            <label class="block text-sm font-medium mb-1">
                Nama Partner
            </label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full border rounded-lg px-3 py-2
                          focus:ring focus:ring-orange-300"
                required>
        </div>

        {{-- Logo --}}
        <div class="flex flex-col md:flex-row gap-6 items-start">

            {{-- Placeholder preview --}}
            <div class="md:w-1/3">
                <p class="text-sm font-medium mb-2">Preview Logo</p>
                <div
                    class="h-32 flex items-center justify-center
                           border rounded-lg shadow bg-gray-50 p-3
                           text-gray-400 text-sm">
                    Belum ada logo
                </div>
            </div>

            {{-- Upload --}}
            <div class="md:w-2/3 mt-5">
                <label class="block text-sm font-medium mb-2">
                    Upload Logo
                </label>

                <input type="file" name="logo"
                    class="block w-full text-sm text-gray-600
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-lg file:border-0
                              file:bg-[#0B2347] file:text-white
                              hover:file:bg-orange-500 transition"
                    required>

                <p class="text-xs text-gray-500 mt-2">
                    Format: JPG, PNG. Max 2MB.
                </p>
            </div>

        </div>

        {{-- Action --}}
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="{{ route('dashboard', ['page' => 'adminWebAbout', 'tab' => 'partner']) }}"
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
