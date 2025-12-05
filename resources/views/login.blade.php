<x-head></x-head>

<body>
    <div class="flex justify-center items-center min-h-screen bg-[#0B2347]">
  <div class="bg-white w-[360px] md:w-[420px] rounded-[20px] shadow-xl p-8 relative">

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
        class="w-full border-b border-gray-300 focus:outline-none py-2 text-[14px] text-gray-600">
    </div>

    <div class="mt-4">
      <input name="password" type="password" placeholder="Password"
        class="w-full border-b border-gray-300 focus:outline-none py-2 text-[14px] text-gray-600">
    </div>

    <button type="submit" class="w-full mt-6 bg-[#0B2347] text-white py-2 rounded-[8px] font-semibold">
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

</body>
</html>