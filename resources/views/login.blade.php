<x-head></x-head>

<body>
    <div class="flex justify-center items-center min-h-screen bg-[#0B2347]">
        <div class="relative bg-white p-8 rounded-lg w-[400px]">

            <!-- tombol X -->
            <button class="absolute top-4 right-6 text-orange-500 text-xl font-bold"><a href="/">X</a></button>

            <!-- heading -->
            <h2 class="text-center text-[24px] font-poetsen text-[#0B2347] leading-snug">
                Welcome to <br>
                Koding Akademi!
            </h2>

            <p class="text-center text-[14px] font-medium text-orange-500 mt-4">
                Login with Email
            </p>

            <p class="text-center text-[13px] text-gray-600 mt-1 leading-tight">
                To login enter the Email address and password <br>
                associated with your account
            </p>

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="mt-5">
                    <input name="email" type="text" placeholder="Username atau Email"
                        class="w-full border-b border-gray-300 focus:outline-none py-2 text-[14px] text-gray-600 rounded focus:ring">
                </div>

                <div class="relative mt-4">
                    <input id="password" name="password" type="password" placeholder="Password"
                        class="w-full border-b border-gray-300 focus:outline-none text-[14px] text-gray-600  py-2 pr-10 rounded focus:ring">

                    <button type="button" onclick="togglePassword()"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <!-- eye -->
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5
                   c4.478 0 8.268 2.943 9.542 7
                   -1.274 4.057-5.064 7-9.542 7
                   -4.477 0-8.268-2.943-9.542-7z" />
                        </svg>

                        <!-- eye off -->
                        <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19
                   c-4.478 0-8.268-2.943-9.543-7
                   a9.956 9.956 0 012.188-3.592M9.88 9.88
                   a3 3 0 104.243 4.243M6.1 6.1
                   L3 3m18 18l-3-3" />
                        </svg>
                    </button>
                </div>


                @if (session('error'))
                    <div
                        class="absolute -top-14 left-0 right-0
               bg-red-100 border border-red-400 text-red-700
               px-4 py-2 rounded text-sm text-center">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div
                        class="absolute -top-14 left-0 right-0
               bg-red-100 border border-red-400 text-red-700
               px-4 py-2 rounded text-sm text-center">
                        Harap isi dengan benar!
                    </div>
                @endif

                <button type="submit"
                    class="w-full mt-6 bg-[#0B2347] text-white py-2 rounded-[8px] font-semibold hover:bg-orange-500 transition">
                    Login
                </button>
            </form>



            <p class="text-center text-[13px] text-gray-600 mt-4">
                ask admin for your account</span>
            </p>

            <p class="text-center text-[12px] text-gray-500 mt-1">
                Sign in to access the member page
            </p>

        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const open = document.getElementById('eyeOpen');
            const closed = document.getElementById('eyeClosed');

            if (input.type === 'password') {
                input.type = 'text';
                open.classList.add('hidden');
                closed.classList.remove('hidden');
            } else {
                input.type = 'password';
                open.classList.remove('hidden');
                closed.classList.add('hidden');
            }
        }
    </script>


</body>

</html>
