@props(['role'])

<aside class="w-[260px] bg-[#FF8A00] text-white flex flex-col py-6">

  <nav class="flex-1 ml-0">
    
    {{-- MENU UNTUK MURID --}}
    @if($role === 'student')
      <a href="/dashboard?page=studentDashboard" class="px-6 font-poppins py-3 hover:bg-white/20 block">Dashboard</a>
      <a href="/dashboard?page=studentCourse" class="px-6 font-poppins py-3 hover:bg-white/20 block">Course</a>
      <a href="/dashboard?page=studentProfile" class="px-6 font-poppins py-3 hover:bg-white/20 block">Profile</a>
    @endif

    {{-- MENU UNTUK TEACHER --}}
    @if($role === 'teacher')
      <a href="/dashboard?page=teacherDashboard" class="px-6 font-poppins py-3 hover:bg-white/20 block">Dashboard</a>
      <a href="/dashboard?page=teacherStudent" class="px-6 font-poppins py-3 hover:bg-white/20 block">Student</a>
      <a href="/dashboard?page=teacherReport" class="px-6 font-poppins py-3 hover:bg-white/20 block">Report</a>
      <a href="/dashboard?page=teacherCourse" class="px-6 font-poppins py-3 hover:bg-white/20 block">Course</a>
      <a href="/dashboard?page=teacherProfile" class="px-6 font-poppins py-3 hover:bg-white/20 block">Profile</a>
    @endif

    {{-- MENU UNTUK ADMIN --}}
    @if($role === 'admin')
      <a href="/dashboard?page=adminDashboard" class="px-6 font-poppins py-3 hover:bg-white/20 block">Dashboard</a>
      <a href="/dashboard?page=adminWebsite" class="px-6 font-poppins py-3 hover:bg-white/20 block">Website</a>
      <a href="/dashboard?page=adminCourse" class="px-6 font-poppins py-3 hover:bg-white/20 block">Course</a>
      <a href="/dashboard?page=adminStudent" class="px-6 font-poppins py-3 hover:bg-white/20 block">Student</a>
      <a href="/dashboard?page=adminTeacher" class="px-6 font-poppins py-3 hover:bg-white/20 block">Teacher</a>
    @endif

     <form action="/logout" method="POST" class="mt-3">
        @csrf
        <button class="w-full flex items-center justify-center gap-2 bg-white hover:bg-white/20 hover:text-white text-[#FF8A00] font-poppins">
            <ion-icon name="log-out-outline" class="text-[26px] -scale-x-100"></ion-icon>
            Logout
        </button>
    </form>

  </nav>
</aside>
