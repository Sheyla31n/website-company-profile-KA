<x-head></x-head>

<body class="bg-[#06224D]">
  
  <x-nav-bar></x-nav-bar>
  <div class="min-h-screen flex">
    <x-dashboard-bar :role="auth()->user()->role" />
    <x-dashboard-content :role="auth()->user()->role"></x-dashboard-content>
  </div>

</body>

