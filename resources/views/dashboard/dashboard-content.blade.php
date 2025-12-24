@props(['role' => '', 'page' => ''])
<!-- MAIN CONTENT -->
<main class="flex-1 bg-white rounded-tl-[0px] min-h-screen p-8">
    {{-- ================= STUDENT ================== --}}
    @if ($role === 'student')

        @if ($page === 'studentDashboard')
            <x-student.dashboard />
        @elseif($page === 'studentCourse')
            <x-student.course />
        @elseif($page === 'studentProfile')
            <x-student.profile />
        @endif

        {{-- ================= TEACHER ================== --}}
    @elseif($role === 'teacher')
        @if ($page === 'teacherDashboard')
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
        @if ($page === 'adminDashboard')
            @include('admin.dashboard')

            {{-- COURSE --}}
        @elseif($page === 'adminCourse')
            @include('admin.course.index')
        @elseif($page === 'adminCourseCreate')
            @include('admin.course.create')
        @elseif($page === 'adminCourseEdit')
            @include('admin.course.edit')

            {{-- WEBSITE EDIT --}}
        @elseif($page === 'adminWebsite')
            @include('admin.website')

            {{-- USER --}}
        @elseif($page === 'adminStudent')
            @include('admin.student')
        @elseif($page === 'adminTeacher')
            @include('admin.teacher')
        @elseif($page === 'adminAkunCreate')
            @include('admin.akun.create')
        @elseif ($page === 'adminAkunEdit')
            @include('admin.akun.edit')
        @endif
    @endif

    {{-- ================= ADMIN WEB ================== --}}
    @if ($page === 'adminWebHome')
        @include('kelola-web.home.index')
    @elseif ($page === 'adminWebHomeEdit')
        @include('kelola-web.home.edit')

        {{-- about --}}
    @elseif ($page === 'adminWebAbout')
        @include('kelola-web.about.index')
    @elseif ($page === 'adminWebAboutEdit')
        @include('kelola-web.about.edit')
    @elseif ($page === 'adminWebPartnerEdit')
        @include('kelola-web.partner.edit')
    @elseif ($page === 'adminWebPartnerCreate')
        @include('kelola-web.partner.create')

        {{-- course --}}
    @elseif ($page === 'adminWebCourse')
        @include('kelola-web.course.index')
    @elseif ($page === 'adminWebKategoriEdit')
        @include('kelola-web.course.edit')
    @elseif ($page === 'adminWebReviewEdit')
        @include('kelola-web.review.edit')

        {{-- blog --}}
    @elseif ($page === 'adminWebBlog')
        @include('kelola-web.blog.index')
    @elseif ($page === 'adminWebBlogEdit')
        @include('kelola-web.blog.edit')
    @elseif ($page === 'adminWebBlogCreate')
        @include('kelola-web.blog.create')
    @endif


</main>
