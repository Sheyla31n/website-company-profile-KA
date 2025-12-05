<main class="bg-white min-h-screen px-6 lg:px-20 py-10">

  <!-- Back + Filter + Search Row -->
  <div class="flex flex-col lg:flex-row items-center gap-4 mb-8">

    <!-- Spacer -->
    <div class="flex-1"></div>

    <!-- Dropdown -->
    <div class="flex items-center">
      <select class="border border-gray-300 rounded-full px-4 py-2 text-[14px] w-[200px]">
        <option>All Courses</option>
        <option>Beginner</option>
        <option>Intermediate</option>
        <option>Advanced</option>
      </select>
    </div>

    <!-- Search Bar -->
    <div class="flex items-center border border-gray-300 rounded-full px-4 py-2 w-[350px] lg:w-[450px]">
      <input type="text" placeholder="Search" class="flex-1 focus:outline-none text-[14px]">
      <ion-icon name="search-outline" class="text-xl text-gray-700"></ion-icon>
    </div>

  </div>


  <!-- Cards Grid -->
  <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">

    <!-- CARD -->
    <div class="rounded-[20px] bg-[#E4E0DD] h-[180px] shadow-sm"></div>
    <div class="rounded-[20px] bg-[#E4E0DD] h-[180px] shadow-sm"></div>
    <div class="rounded-[20px] bg-[#E4E0DD] h-[180px] shadow-sm"></div>
    <div class="rounded-[20px] bg-[#E4E0DD] h-[180px] shadow-sm"></div>
    <div class="rounded-[20px] bg-[#E4E0DD] h-[180px] shadow-sm"></div>

    <div class="rounded-[20px] bg-[#E4E0DD] h-[180px] shadow-sm"></div>
    <div class="rounded-[20px] bg-[#E4E0DD] h-[180px] shadow-sm"></div>
    <div class="rounded-[20px] bg-[#E4E0DD] h-[180px] shadow-sm"></div>
    <div class="rounded-[20px] bg-[#E4E0DD] h-[180px] shadow-sm"></div>
    <div class="rounded-[20px] bg-[#E4E0DD] h-[180px] shadow-sm"></div>

  </div>


  <!-- Pagination -->
  <div class="text-center mt-10 text-gray-600">
    page <span class="text-black font-semibold">1</span> 
    <span class="cursor-pointer px-2">2</span>
    <span class="cursor-pointer px-2">3</span>
    <span class="cursor-pointer px-2">…</span>
  </div>
</main>
