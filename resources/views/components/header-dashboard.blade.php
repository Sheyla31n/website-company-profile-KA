@props(['title', 'description'])

<div>
    <h2 class="font-poetsen mb-2 text-[36px] text-[#0B2347]">
        {{ $title }}
    </h2>

    <p class="font-poppins text-gray-500">
        {{ $description }}
    </p>

    {{ $slot ?? '' }}
</div>
