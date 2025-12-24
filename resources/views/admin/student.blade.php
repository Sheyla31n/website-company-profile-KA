@extends('dashboard.dashboard-content', ['role' => 'admin', 'page' => 'adminStudent'])


<x-header-dashboard>
    <x-slot:title>Student Koding Akademi</x-slot:title>
    <x-slot:description></x-slot:description>
</x-header-dashboard>

<a href="{{ route('admin.user.create', ['role' => 'student']) }}"
    class="bg-gray-600 min-h-3 font-poppins text-[12px] text-white px-5 py-1 rounded-l mr-5 shadow hover:bg-[#e57800] transition">
    + Tambah
</a>

@php
    $columns = ['Name', 'Email', 'Course'];
    foreach ($students as $student) {
        $rows[] = [
            'Name' => $student->name,
            'Email' => $student->email,
            'Course' => $student->courses->pluck('title')->join(', '),
            // 🔥 URL PENTING
            'edit_url' => route('admin.user.edit', [$student->id, 'role' => 'student']),
            'delete_url' => route('admin.user.destroy', [$student->id, 'role' => 'student']),
        ];
    }
@endphp

@include('components.table', ['columns' => $columns, 'rows' => $rows])

{{ $students->links('vendor.pagination.pagination') }}
