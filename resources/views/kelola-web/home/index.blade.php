<x-header-dashboard>
    <x-slot:title>Kelola Home</x-slot:title>
    <x-slot:description>Edit gambar slider (maksimal 3)</x-slot:description>
</x-header-dashboard>

@php
    $columns = ['Image'];
    $rows = [];

    foreach ($homeSliders as $slider) {
        $rows[] = [
            'Image' => basename($slider->image), // LINK GAMBAR
            'edit_url' => route('admin.web.home.edit', $slider->id), // LINK EDIT
        ];
    }
@endphp


@include('components.table', [
    'columns' => $columns,
    'rows' => $rows,
    'showEdit' => true,
    'showDelete' => false,
])
