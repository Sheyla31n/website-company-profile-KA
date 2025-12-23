<section id="blog" class="fade-in min-h-[70vh] bg-white py-2 items-center">

    <h1 class="text-center font-poetsen text-[#0B2347] text-[36px] mb-8">
        Blog Article
    </h1>

    @include('components.main.blog-content', ['articles' => $articles])

</section>
