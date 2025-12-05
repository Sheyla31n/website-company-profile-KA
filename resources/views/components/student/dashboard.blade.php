<div>
    @php
      $user = auth()->user();
      $displayName = $user->role === 'admin' ? 'Admin' : $user->name;
    @endphp

      <h1 class="text-[28px] font-bold mb-6 text-[#0B2347]">
          Welcome {{ $displayName }}!
      </h1>

</div>