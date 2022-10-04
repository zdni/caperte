    <div class="mobile-navbar overflow-y-auto fixed bg-white dark:bg-background -left-full top-0 h-full w-full transition-all z-[100]">
      <div class="flex justify-end py-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 text-gray-500 close-navbar-btn" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </div>
      <ul class="mx-5">
        <li class="">
          <div class="dropdown dropdown-mobile dark:bg-foreground rounded-lg" data-dropdown>
            <a href="<?= base_url() ?>" class="link w-full py-3 flex dark:border-gray-800 pb-5 justify-between items-center border-b border-gray-200 font-normal text-gray-500 dark:text-gray-200">
              Beranda
            </a>
            <a href="<?= base_url('dashboard/cari') ?>" class="link w-full py-3 flex dark:border-gray-800 pb-5 justify-between items-center border-b border-gray-200 font-normal text-gray-500 dark:text-gray-200">
              Cari SPBU
            </a>
          </div>
        </li>

      </ul>
    </div>
    <header class="w-full navbar h-20 flex items-center sticky-header z-50 relative dark:bg-background dark:text-gray-100 transition-all">
      <nav class="container mx-auto flex items-center justify-between lg:px-5 px-5">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:hidden block menu-btn" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <div>
          <a href="<?= base_url() ?>" class="flex items-center">
            <img class="w-11 h-11 mr-3" src="<?= base_url('assets/img/logo.png') ?>" alt="" />
            <h6 class="text-base font-medium">CAPERTE</h6>
          </a>
        </div>
        <a href="<?= base_url('auth/login') ?>" class=" flex items-center px-3 py-[9px] lg:hidden rounded-lg border border-gray-200">
          Masuk
        </a>
        <div class="hidden lg:flex items-center">
          <ul class="flex items-center">
            <li class="">
              <div class="relative [&>div] [&>div]:hover:visible [&>div]:hover:transition-all [&>div]:hover:pt-3 [&>div]:hover:h-full [&>div]:hover:opacity-100 [&>div]:hover:top-auto [&>div]:hover:z-10 pr-9" >
                <a href="<?= base_url() ?>"  class="link hover:text-blue-500 flex items-center">
                  Beranda
                </a>
              </div>
            </li>
            <li class="">
              <div class="relative [&>div] [&>div]:hover:visible [&>div]:hover:transition-all [&>div]:hover:pt-3 [&>div]:hover:h-full [&>div]:hover:opacity-100 [&>div]:hover:top-auto [&>div]:hover:z-10 pr-9" >
                <a href="<?= base_url('dashboard/cari') ?>"  class="link hover:text-blue-500 flex items-center">
                  Cari SPBU
                </a>
              </div>
            </li>
          </ul>
          <a href="<?= base_url('auth/login') ?>" class="inline-flex items-center px-3 py-[9px] rounded-lg border border-gray-200">
            <span class="xl:block hidden">Masuk</span>
          </a>
        </div>
      </nav>
    </header>