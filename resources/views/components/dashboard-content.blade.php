@php
    $role = auth()->user()->role;
    $page = request('page') ?: 'dashboard';  // default dashboard
@endphp

<!-- MAIN CONTENT -->
    <main class="flex-1 bg-white rounded-tl-[0px] min-h-screen p-8">
      {{-- ================= STUDENT ================== --}}
      @if($role === 'student')

        @if($page === 'studentDashboard')
            <x-student.dashboard />
        @elseif($page === 'studentCourse')
            <x-student.course />
        @elseif($page === 'studentProfile')
            <x-student.profile />
        @endif

      {{-- ================= TEACHER ================== --}}
      @elseif($role === 'teacher')

        @if($page === 'teacherDashboard')
            <x-teacher.dashboard />
        @elseif($page === 'teacherCourse')
            <x-teacher.course />
        @elseif($page === 'teacherStudent')
            <x-teacher.student />
        @elseif($page === 'teacherReport')
            <x-teacher.report />
        @elseif($page === 'teacherProfile')
            <x-teacher.profile />
        @endif

        {{-- ================= ADMIN ================== --}}
      @elseif($role === 'admin')

        @if($page === 'adminDashboard')
            <x-admin.dashboard />
        @elseif($page === 'adminCourse')
            <x-admin.course />
        @elseif($page === 'adminWebsite')
            <x-admin.website />
        @elseif($page === 'adminStudent')
            <x-admin.student />
        @elseif($page === 'adminTeacher')
            <x-admin.teacher />
        @endif
        
    @endif
    </main>