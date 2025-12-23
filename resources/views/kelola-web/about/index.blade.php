    <x-header-dashboard>
        <x-slot:title>Kelola About</x-slot:title>
        <x-slot:description></x-slot:description>
    </x-header-dashboard>

    @php
        $tab = request('tab', 'about'); // default about
    @endphp

    <div class="flex gap-3 mt-4 border-b pb-2">
        <a href="/dashboard?page=adminWebAbout&tab=about"
            class="px-4 py-2 rounded-t font-poppins text-sm
        {{ $tab === 'about' ? 'bg-gray-700 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
            Deskripsi About
        </a>

        <a href="/dashboard?page=adminWebAbout&tab=partner"
            class="px-4 py-2 rounded-t font-poppins text-sm
        {{ $tab === 'partner' ? 'bg-gray-700 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
            Partner
        </a>
    </div>

    @if ($tab === 'about')
        @php
            $columns = ['Deskripsi'];
            $rows = [];

            foreach ($About as $about) {
                $rows[] = [
                    'Deskripsi' => $about->description,
                    'edit_url' => route('admin.web.about.edit'),
                ];
            }
        @endphp

        @include('components.table', [
            'columns' => $columns,
            'rows' => $rows,
            'showEdit' => true,
            'showDelete' => false,
        ])
    @endif

    @if ($tab === 'partner')
        <a href="{{ route('admin.web.partner.create') }}"
            class="inline-block bg-gray-600 font-poppins text-[12px]
           text-white px-5 py-1 rounded shadow
           hover:bg-[#e57800] transition mt-2">
            + Tambah Partner
        </a>

        @php
            $columns = ['Partner', 'Logo Partner'];
            $rows = [];

            foreach ($Partners as $partner) {
                $rows[] = [
                    'Partner' => $partner->name,
                    'Logo Partner' => basename($partner->logo),
                    'edit_url' => route('admin.web.partner.edit', $partner->id),
                    'delete_url' => route('admin.web.partner.destroy', $partner->id),
                ];
            }
        @endphp

        @include('components.table', [
            'columns' => $columns,
            'rows' => $rows,
            'showEdit' => true,
            'showDelete' => true,
        ])

        {{ $Partners->links('vendor.pagination.pagination') }}
    @endif
