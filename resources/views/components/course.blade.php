<!-- Course -->
<section id="courses" class="fade-in min-h-screen bg-white py-4">
  <h1 class="text-center font-poetsen text-[#0B2347] text-[36px] mb-3">
    Our Courses
  </h1>

  <div class="relative bg-[#0B2347] rounded-[50px_0_50px_0] min-h-[90vh] py-8 px-6">

    <!-- CARD WRAPPER -->
    <<div class="flex gap-4 overflow-x-auto justify-center pb-6">

  @for ($i = 0; $i < 5; $i++)
  <div class="
      bg-white shadow-xl rounded-xl flex-shrink-0 
      w-[50px] h-[240px]       <!-- mobile -->
      sm:w-[160px] sm:h-[260px] <!-- tablet -->
      md:w-[180px] md:h-[300px] <!-- laptop -->
    ">
    <div class="bg-gray-300 w-full h-[70%] rounded-t-xl"></div>
  </div>
  @endfor

</div>

    <!-- WHITE CURVE BOTTOM -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 bg-white rounded-[50px_0_50px_0] h-[150px] w-[90%]"></div>
</div>
</section>