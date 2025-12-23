@props(['role'])

<header id="navbar"
    class="bg-[#0B2347] rounded-b-[15px] fixed top-0 left-0 w-full z-50 transition-transform duration-500 ease-in-out">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8 shadow transition-opacity duration-500">

        <!-- LOGO -->
        <a href="#" class="flex lg:flex-1 -m-1.5 p-1.5">
            <img src="{{ asset('img/logoKA.jpg') }}" alt="Logo" class="h-10 w-auto" />
        </a>

        <!-- MOBILE MENU BUTTON -->
        <button type="button" command="show-modal" commandfor="mobile-menu"
            class="lg:hidden -m-2.5 p-2.5 text-white rounded-md">
            <ion-icon name="menu-outline" class="text-2xl"></ion-icon>
        </button>

        <!-- DESKTOP MENU -->
        <el-popover-group class="hidden lg:flex lg:gap-x-12 text-white text-[16px]">
            <x-navlink href="/#home">Home</x-navlink>
            <x-navlink href="/#about">About</x-navlink>

            <!-- COURSES DROPDOWN -->
            <div x-data="{ open: false }" @mouseenter= "open = true" @mouseleave= "open = false" class="relative">
                <button popovertarget="desktop-menu-product"
                    class="flex items-center gap-1 font-poppins text-white hover:underline hover:decoration-[3px] hover:underline-offset-5">
                    <x-navlink href="/#courses">Course</x-navlink>
                    <ion-icon name="chevron-down-outline" class="text-gray-300 transition-all duration-300"
                        :class="open ? 'rotate-180' : 'rotate-0'">
                    </ion-icon>
                </button>
                <div x-show="open" x-transition class="absolute top-full left-0 mt-2 w-52  bg-white shadow-lg z-50">
                    <div class="p-3 space-y-1">
                        <a href="/course" class="block p-2 text-black hover:bg-gray-50 cursor-pointer">ROBOTICS</a>
                        <a href="/course" class="block p-2 text-black hover:bg-gray-50 cursor-pointer">CODING</a>
                        <a href="/course" class="block p-2 text-black hover:bg-gray-50 cursor-pointer">APP
                            PROGRAMMING</a>
                        <a href="/course" class="block p-2 text-black hover:bg-gray-50 cursor-pointer">ENGINEERING</a>
                        <a href="/course" class="block p-2 text-black hover:bg-gray-50 cursor-pointer">CODING
                            BOOTCAMP</a>
                    </div>
                </div>
            </div>

            <x-navlink href="/#blog">Blog</x-navlink>
            <x-navlink href="/#contact">Contact</x-navlink>
        </el-popover-group>

        <!-- LOGIN ICON -->
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">

            @php
                $user = auth()->user();

                // Menentukan display name
                $displayName = $user ? ($user->role === 'admin' ? 'Admin' : $user->name) : 'Akun';

                // Menentukan redirect URL sesuai role
                if (!$user) {
                    $redirectUrl = '/login';
                } else {
                    switch ($user->role) {
                        case 'admin':
                            $redirectUrl = '/dashboard?page=adminDashboard';
                            break;
                        case 'teacher':
                            $redirectUrl = '/dashboard?page=teacherDashboard';
                            break;
                        default:
                            // student
                            $redirectUrl = '/dashboard?page=studentDashboard';
                            break;
                    }
                }
            @endphp

            <a href="{{ $redirectUrl }}" class="flex items-center gap-2">
                <span class="text-white font-poppins text-[15px]">
                    {{ $displayName }}
                </span>
                <ion-icon name="person-circle-outline" class="text-[28px] text-white"></ion-icon>
            </a>
        </div>

    </nav>

    <!-- MOBILE MENU -->
    <el-dialog>
        <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
            <el-dialog-panel class="fixed inset-y-0 right-0 z-50 max-w-sm w-full bg-white p-6">

                <div class="flex items-center justify-between">
                    <a href="#" class="p-1.5">
                        <img src="img/logoKA.jpg" alt="Logo" class="h-8 w-auto" />
                    </a>
                    <button type="button" command="close" commandfor="mobile-menu" class="p-2.5 text-gray-700">
                        <ion-icon name="close-outline" class="text-2xl"></ion-icon>
                    </button>
                </div>

                <div class="mt-6 space-y-4">
                    <a href="/#home" class="block text-gray-900 font-semibold">Home</a>
                    <a href="/#about" class="block text-gray-900 font-semibold">About</a>
                    <a href="/#courses" class="block text-gray-900 font-semibold">Courses</a>
                    <a href="/#blog" class="block text-gray-900 font-semibold">Blog</a>
                    <a href="/#contact" class="block text-gray-900 font-semibold">Contact</a>
                    <a href="/login" class="block text-gray-900 font-semibold">
                        @php
                            $user = auth()->user();

                            // Menentukan display name
                            $displayName = $user ? ($user->role === 'admin' ? 'Admin' : $user->name) : 'Akun';

                            // Menentukan redirect URL sesuai role
                            if (!$user) {
                                $redirectUrl = '/login';
                            } else {
                                switch ($user->role) {
                                    case 'admin':
                                        $redirectUrl = '/dashboard?page=adminDashboard';
                                        break;
                                    case 'teacher':
                                        $redirectUrl = '/dashboard?page=teacherDashboard';
                                        break;
                                    default:
                                        // student
                                        $redirectUrl = '/dashboard?page=studentDashboard';
                                        break;
                                }
                            }
                        @endphp
                        {{ $displayName }}
                    </a>
                </div>

            </el-dialog-panel>
        </dialog>
    </el-dialog>
</header>

<script>
    let lastScrollTop = 0;
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function() {
        let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
            // scroll DOWN → sembunyikan navbar
            navbar.classList.add("hide-nav");
        } else {
            // scroll UP → tampilkan navbar
            navbar.classList.remove("hide-nav");
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    });
</script>

<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            const targetID = this.getAttribute('href');
            const target = document.querySelector(targetID);
            const navbarHeight = document.querySelector('nav').offsetHeight;

            const targetPosition = target.offsetTop - navbarHeight;

            window.scrollTo({
                top: targetPosition,
                behavior: "smooth"
            });
        });
    });
</script>
