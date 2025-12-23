@props(['role'])

<!-- SIDEBAR -->
<aside id="sidebar"
    class="w-[260px] bg-gray-500 text-white flex flex-col py-6 fixed lg:static inset-y-0 left-0 
    transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-40">

    <nav class="flex-1 ml-0 mt-10">

        {{-- MENU UNTUK MURID --}}
        @if ($role === 'student')
            <a href="/dashboard?page=studentDashboard"
                class="px-6 font-poppins py-3 hover:bg-white/20 block">Dashboard</a>
            <a href="/dashboard?page=studentCourse" class="px-6 font-poppins py-3 hover:bg-white/20 block">Course</a>
            <a href="/dashboard?page=studentProfile" class="px-6 font-poppins py-3 hover:bg-white/20 block">Profile</a>
        @endif

        {{-- MENU UNTUK TEACHER --}}
        @if ($role === 'teacher')
            <a href="/dashboard?page=teacherDashboard"
                class="px-6 font-poppins py-3 hover:bg-white/20 block">Dashboard</a>
            <a href="/dashboard?page=teacherStudent" class="px-6 font-poppins py-3 hover:bg-white/20 block">Student</a>
            <a href="/dashboard?page=teacherReport" class="px-6 font-poppins py-3 hover:bg-white/20 block">Report</a>
            <a href="/dashboard?page=teacherCourse" class="px-6 font-poppins py-3 hover:bg-white/20 block">Course</a>
            <a href="/dashboard?page=teacherProfile" class="px-6 font-poppins py-3 hover:bg-white/20 block">Profile</a>
        @endif

        {{-- MENU UNTUK ADMIN --}}
        @if ($role === 'admin')
            <a href="/dashboard?page=adminDashboard"
                class="px-6 font-poppins py-3 hover:bg-white/20 block">Dashboard</a>
            <div class="group">
                <!-- MENU UTAMA -->
                <a href="/dashboard?page=adminWebsite"
                    class="px-6 py-3 font-poppins flex justify-between items-center
               hover:bg-white/20 transition">
                    Website
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">

                    </svg>
                </a>

                <!-- SUB MENU (PUSH KE BAWAH) -->
                <div
                    class="ml-6
               max-h-0 overflow-hidden
               group-hover:max-h-64
               transition-all duration-300 ease-in-out">

                    <a href="/dashboard?page=adminWebHome" class="block px-4 py-2 hover:bg-white/20 rounded">
                        Home
                    </a>

                    <a href="/dashboard?page=adminWebAbout" class="block px-4 py-2 hover:bg-white/20 rounded">
                        About
                    </a>

                    <a href="/dashboard?page=adminWebCourse" class="block px-4 py-2 hover:bg-white/20 rounded">
                        Course
                    </a>

                    <a href="/dashboard?page=adminWebBlog" class="block px-4 py-2 hover:bg-white/20 rounded">
                        Blog
                    </a>
                </div>
            </div>

            <a href="/dashboard?page=adminCourse" class="px-6 font-poppins py-3 hover:bg-white/20 block">Course</a>
            <a href="/dashboard?page=adminStudent" class="px-6 font-poppins py-3 hover:bg-white/20 block">Student</a>
            <a href="/dashboard?page=adminTeacher" class="px-6 font-poppins py-3 hover:bg-white/20 block">Teacher</a>
        @endif

        <form action="/logout" method="POST" class="mt-3">
            @csrf
            <button
                class="w-full flex items-center justify-center gap-2 bg-white/20 hover:bg-white/20 hover:text-gray-100 text-white font-poppins">
                <ion-icon name="log-out-outline" class="text-[26px] -scale-x-100"></ion-icon>
                Logout
            </button>
        </form>

    </nav>
</aside>
