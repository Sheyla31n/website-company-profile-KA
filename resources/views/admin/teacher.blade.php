    <x-header-dashboard>
        <x-slot:title>Teacher Koding Akademi</x-slot:title>
        <x-slot:description></x-slot:description>
    </x-header-dashboard>

    <a href="{{ route('admin.user.create', ['role' => 'teacher']) }}"
        class="bg-gray-600 min-h-3 font-poppins text-[12px] text-white px-5 py-1 rounded-l mr-5 shadow hover:bg-[#e57800] transition">
        + Tambah
    </a>

    {{-- Table --}}
    @php
        $columns = ['Name', 'Email', 'Course'];
        foreach ($teachers as $teacher) {
            $rows[] = [
                'Name' => $teacher->name,
                'Email' => $teacher->email,
                'Course' => $teacher->courses->pluck('title')->join(', '),
                // 🔥 URL PENTING
                'edit_url' => route('admin.user.edit', [$teacher->id, 'role' => 'teacher']),
                'delete_url' => route('admin.user.destroy', [$teacher->id, 'role' => 'teacher']),
            ];
        }
    @endphp

    @include('components.table', [
        'columns' => $columns,
        'rows' => $rows,
        'showEdit' => true,
        'showDelete' => true,
    ])

    {{ $teachers->links('vendor.pagination.pagination') }}
