<x-header-dashboard>
    <x-slot:title>Dashboard</x-slot:title>
    <x-slot:description>Selamat datang dan semangat belajar!</x-slot:description>
</x-header-dashboard>

<!-- TOP STATS -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6 mt-5">
    <div class="bg-gray-300 shadow-md p-4 rounded-xl text-center">
        <p class="text-4xl font-bold">0</p>
        <p class="text-gray-600 text-sm">Course Completed</p>
    </div>

    <div class="bg-gray-300 shadow-md p-4 rounded-xl text-center">
        <p class="text-4xl font-bold">0</p>
        <p class="text-gray-600 text-sm">Unit Completed</p>
    </div>

    <div class="bg-gray-300 shadow-md p-4 rounded-xl text-center">
        <p class="text-4xl font-bold">0</p>
        <p class="text-gray-600 text-sm">Assignment Completed</p>
    </div>

    <div class="bg-gray-300 shadow-md p-4 rounded-xl text-center">
        <p class="text-4xl font-bold">0</p>
        <p class="text-gray-600 text-sm">Quizzes Completed</p>
    </div>
</div>

<!-- COURSE PROGRESS -->
<h2 class="font-poetsen text-6 text-lg mb-3 text-[#0B2347]">Course Progress</h2>

<div class="space-y-4">

    <!-- ITEM 1 -->
    <div>
        <div class="flex justify-between mb-1 text-sm font-medium">
            <span>Basic Coding</span>
            <span>70%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-3">
            <div class="bg-red-500 h-3 rounded-full" style="width:70%"></div>
        </div>
    </div>

    <!-- ITEM 2 -->
    <div>
        <div class="flex justify-between mb-1 text-sm font-medium">
            <span>Game Programming Beginner</span>
            <span>30%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-3">
            <div class="bg-red-500 h-3 rounded-full" style="width:30%"></div>
        </div>
    </div>

    <!-- ITEM 3 -->
    <div>
        <div class="flex justify-between mb-1 text-sm font-medium">
            <span>Basic Coding</span>
            <span>75%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-3">
            <div class="bg-red-500 h-3 rounded-full" style="width:75%"></div>
        </div>
    </div>

    <!-- ITEM 4 -->
    <div>
        <div class="flex justify-between mb-1 text-sm font-medium">
            <span>Game Programming Beginner</span>
            <span>30%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-3">
            <div class="bg-red-500 h-3 rounded-full" style="width:30%"></div>
        </div>
    </div>

</div>
