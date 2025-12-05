<section id="blog" class="fade-in min-h-[60vh] bg-white py-2">

  <h1 class="text-center font-poetsen text-[#0B2347] text-[36px] mb-8">
    Blog Article
  </h1>

  <div class="w-[90%] mx-auto">
    <div class="flex gap-6 overflow-x-auto pb-4 justify-center">

      @for ($i = 0; $i < 4; $i++)
      <div class="bg-white shadow-xl rounded-xl w-[200px] h-[320px] flex-shrink-0">
        <div class="bg-gray-100 w-full h-[200px] rounded-xl"></div>
      </div>
      @endfor

    </div>
  </div>

</section>