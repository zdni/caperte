<?php
  function rupiah( $angka )
  {
    return "Rp " . number_format($angka,2,',','.');
  }
?>
  <div class="font-inter dark:bg-background sticky-header-first-content">
    <section class="pt-0 border-b border-gray-200 dark:border-foreground dark:bg-background lg:px-0 px-5">
      <div class="container-fluid mx-auto lg:p-0 p-5">
        <div class="bg-gray-100 dark:bg-foreground py-14">
          <div class="container mx-auto px-5">
            <ul class="flex items-center mb-5">
              <li class="text-base text-gray-500 dark:text-gray-100 mr-1"><a href="<?= base_url() ?>">Beranda</a></li>
              <li class="text-base text-gray-500 dark:text-gray-100 mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
              </li>
              <li class="text-base text-gray-500 dark:text-gray-100 mr-1">
                Detail SPBU
              </li>
            </ul>
            <div class="flex justify-between flex-wrap">
              <div class="mb-4">
                <div class="flex items-center mb-1">
                  <h4 class="text-gray-700 font-medium dark:text-gray-100 mr-2 lg:text-3xl text-2xl">
                    <?= $station->nama ?>
                  </h4>
                </div>
                <div class="flex items-center text-gray-500 dark:text-gray-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd" />
                  </svg>
                  <p class="text-base"><?= $station->alamat ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="dark:bg-background pt-20 bg-bodygray lg:px-0 px-5">
      <div class="container mx-auto">
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-7">
          <div class="lg:col-span-2 col-span-1">
            <div class="shadow-front-3 bg-white dark:bg-foreground p-6 rounded-lg mb-7">
              <h4 class="text-base font-medium text-gray-700 dark:text-gray-100 mb-3">
                Daftar Bahan Bakar
              </h4>
              <?php foreach ($stocks as $stock) { ?>
                <a href="#" aria-colcount="" class="flex hover:text-blue-500 dark:hover:text-blue-500 justify-between text-base text-gray-500 dark:text-gray-400 dark:border-gray-800 border-b border-gray-200 items-center py-3">
                  <div>
                    <h6 class="font-medium"><?= $stock->nama_bahan_bakar ?></h6>
                    <span
                      class=" <?= ($stock->status == 1) ? 'bg-blue-200' : 'bg-purple-200' ?> text-xs text-gray-700 font-medium rounded-full px-4 py-1 flex items-center mr-1 mb-3">
                      <svg class="w-3 h-3 mr-1" width="10" height="10" viewBox="0 0 10 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M3.6498 1.40001H6.3498V0.650012C6.3498 0.401575 6.55043 0.200012 6.7998 0.200012C7.04918 0.200012 7.2498 0.401575 7.2498 0.650012V1.40001H7.9998C8.66168 1.40001 9.1998 1.9372 9.1998 2.60001V8.60001C9.1998 9.26189 8.66168 9.80001 7.9998 9.80001H1.9998C1.33699 9.80001 0.799805 9.26189 0.799805 8.60001V2.60001C0.799805 1.9372 1.33699 1.40001 1.9998 1.40001H2.7498V0.650012C2.7498 0.401575 2.95043 0.200012 3.1998 0.200012C3.44918 0.200012 3.6498 0.401575 3.6498 0.650012V1.40001ZM1.6998 8.60001C1.6998 8.76501 1.83405 8.90001 1.9998 8.90001H7.9998C8.1648 8.90001 8.2998 8.76501 8.2998 8.60001V3.80001H1.6998V8.60001Z"
                          fill="#344054" />
                      </svg>

                      <?= $status[$stock->status] ?></span>
                  </div>
                  <p class="text-gray-500 dark:text-gray-300"><?= rupiah( $stock->harga ) ?></p>
                </a>
              <?php } ?>
            </div>

          </div>
          <div class="lg:col-span-1 col-span-1">
            <div class="rounded-lg shadow-fornt-2 dark:bg-foreground bg-white mb-7">
              <div class="mapouter">
                <div class="gmap_canvas">
                  <iframe class="w-full h-64 rounded-t-md" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
              </div>
              
              <div class="p-6 border-b border-gray-200 dark:border-gray-800">
                <div class="flex items-center text-gray-700 dark:text-gray-300 mb-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <p class="text-base"><?= $station->alamat ?></p>
              </div>
              </div>
            </div>
            <a href="<?= base_url('dashboard/algorithm?station=' . $station->id . '&s=rute') ?>"
              class="w-full flex justify-center items-center border border-red-300 rounded-lg text-gray-500 dark:text-gray-300 p-[13px] mb-7">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              Rute
            </a>
          </div>
        </div>
      </div>
    </section>