<x-head></x-head>

<body class="bg-[#06224D] mt-15">

    <x-nav-bar></x-nav-bar>
    <div class="min-h-screen flex">
        @include('dashboard.dashboard-bar', [
            'role' => auth()->user()->role,
        ])
        @include('dashboard.dashboard-content', [
            'role' => auth()->user()->role,
        ])
    </div>

</body>
