<header class="bg-[#0B2347]">
  <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">

    <!-- LOGO -->
    <a href="#" class="flex lg:flex-1 -m-1.5 p-1.5">
      <img src="img/logoKA.jpg" alt="Logo" class="h-10 w-auto" />
    </a>

    <!-- MOBILE MENU BUTTON -->
    <button type="button" command="show-modal" commandfor="mobile-menu" class="lg:hidden -m-2.5 p-2.5 text-white rounded-md">
      <ion-icon name="menu-outline" class="text-2xl"></ion-icon>
    </button>

    <!-- DESKTOP MENU -->
    <el-popover-group class="hidden lg:flex lg:gap-x-5 text-white text-[16px]">

    <!-- Account -->
  <a href="#" class="flex items-center gap-2">
    <span class="text-white font-Poppins text-[15px]">Akun</span>
    <ion-icon name="person-circle-outline" class="text-[28px] text-white"></ion-icon>
  </a>

  <!-- Back -->
  <a href="/" class="flex items-center gap-2 ml-0.5">
    <ion-icon name="home-outline" class="text-[22px] text-white"></ion-icon>
    <span class="text-white font-semibold text-[15px] ml-1">Back to Home</span>
  </a>

    </el-popover-group>
  </nav>

  <!-- MOBILE MENU -->
  <el-dialog>
    <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
     <el-dialog-panel class="fixed inset-y-0 right-0 z-50 max-w-sm w-full bg-white p-6">

        <div class="flex items-center justify-between">
          <a href="#" class="p-1.5">
            <img src="img/logoKA.jpg" alt="Logo" class="h-8 w-auto" />
          </a>
          <button type="button" command="close" commandfor="mobile-menu" class="p-2.5 text-gray-700">
            <ion-icon name="close-outline" class="text-2xl"></ion-icon>
          </button>
        </div>

        <!-- MOBILE ACCOUNT + BACK -->
<div class="lg:hidden flex flex-col w-full mb-6 mt-2 ml-2">

  <!-- Account -->
  <a href="#" class="flex items-center gap-2 mb-3">
    <ion-icon name="person-circle-outline" class="text-[28px] text-[#0B2347]"></ion-icon>
    <span class="text-[#0B2347] font-semibold text-[15px]">Akun</span>
  </a>

  <!-- Back -->
  <a href="#" class="flex items-center gap-2 ml-0.5">
    <ion-icon name="home-outline" class="text-[22px] text-[#0B2347]"></ion-icon>
    <span class="text-[#0B2347] font-semibold text-[15px] ml-1">Back to Home</span>
  </a>

</div>

      </el-dialog-panel>
    </dialog>
  </el-dialog>
</header>