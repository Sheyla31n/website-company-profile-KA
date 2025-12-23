<x-header-dashboard>
    <x-slot:title>Tambah Akun</x-slot:title>
    <x-slot:description>Tambahkan akun baru</x-slot:description>
</x-header-dashboard>

<div class="max-w-3xl bg-white rounded-xl shadow p-6">

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf

        {{-- ROLE TARGET (🔥 SUMBER KEBENARAN) --}}
        <input type="hidden" name="role" value="{{ request('role') }}">

        {{-- Nama --}}
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Nama</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Password</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- ASSIGN COURSE (teacher & student) --}}
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Assign Course</label>

            <div class="space-y-2 max-h-48 overflow-y-auto border rounded p-3">
                @foreach ($courses as $course)
                    <div>
                        <input type="checkbox" name="courses[]" value="{{ $course->id }}"
                            id="course-{{ $course->id }}">
                        <label for="course-{{ $course->id }}" class="ml-2">
                            {{ $course->title }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- ACTION --}}
        <div class="flex justify-end gap-3 pt-4 mt-3 border-t">
            <a href="{{ route('dashboard', [
                'page' => request('role') === 'teacher' ? 'adminTeacher' : 'adminStudent',
            ]) }}"
                class="px-6 py-2 border rounded">
                Batal
            </a>

            <button type="submit" class="px-6 py-2 bg-[#0B2347] text-white rounded-lg hover:bg-orange-500 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
