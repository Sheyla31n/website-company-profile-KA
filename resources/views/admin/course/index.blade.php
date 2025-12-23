<x-header-dashboard>
    <x-slot:title>Course</x-slot:title>
    <x-slot:description></x-slot:description>
</x-header-dashboard>

<a href="{{ route('admin.course.create') }}"
    class="bg-gray-600 min-h-3 font-poppins text-[12px] text-white px-5 py-1 rounded-l mr-5 shadow hover:bg-[#e57800] transition">
    + Tambah
</a>

@php
    $columns = ['Course', 'Icon', 'Kategori'];
    $rows = [];

    foreach ($courses as $course) {
        $rows[] = [
            'Course' => $course->title,
            'Icon' => basename($course->icon),
            'Kategori' => optional($course->category)->name,
            'delete_url' => route('admin.course.destroy', $course->id),
            'edit_url' => route('admin.course.edit', $course->id),
        ];
    }
@endphp

@include('components.table', [
    'columns' => $columns,
    'rows' => $rows,
    'showEdit' => true,
    'showDelete' => true,
])

{{ $courses->links('vendor.pagination.pagination') }}
