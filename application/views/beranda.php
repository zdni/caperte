<!-- end wrapper --> 
  <div class="font-inter dark:bg-background sticky-header-first-content">
    <div class="container mx-auto lg:px-0 px-5 dark:bg-background">
      <div class="relative lg:hidden flex shadow-input p-4 dark:bg-foreground rounded-md mb-4">
        <div class="flex items-center">
          <p class="text-gray-700 text-lg dark:text-gray-100 font-semibold">
            Filters
          </p>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 -rotate-90 text-blue-500 listing-filter-btn"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
          </svg>
        </div>
      </div>
      <div class="relative flex items-start pt-10">
        <div class="listing-sidebar bg-white dark:bg-foreground shadow-front-2 z-50 lg:w-80 w-full lg:sticky fixed transition-all ease-in-out translate-x-0 lg:left-0 -left-full top-20 lg:h-full h-screen">
          <div class="border-b lg:border-gray-200 border-transparent dark:border-foreground p-5">
            <p class="text-gray-700 text-lg dark:text-gray-300 font-semibold lg:block hidden">
              Filter
            </p>
            <div class="lg:hidden flex justify-between container mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 close-left-sidebar" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </div>
          </div>
          <div class="p-5 h-5/6 overflow-y-auto">
            <form action="<?= base_url('dashboard/algorithm') ?>" method="get">
              <p class="text-gray-700 text-lg dark:text-gray-100 font-semibold mb-4">Daftar Bahan Bakar</p>
              <ul>
                <?php foreach ($fuels as $fuel) { ?>
                  <li class="mb-2 flex items-center">
                    <input class="accent-blue-500 w-4 h-4 mr-3 border" type="checkbox" id="vehicle1" name="vehicle1" value="<?= $fuel->id ?>"/>
                    <label for="vehicle1" class="text-gray-500 dark:text-gray-300"> <?= $fuel->nama ?></label>
                  </li>
                <?php } ?>
              </ul>
              <button type="submit" class="bg-blue-500 text-white hover:bg-blue-600 rounded-lg w-full p-3.5 mt-9 mb-4"> Cari SPBU</button>
            </form>
          </div>
        </div>

        <div class="listing-sidebar-overlay fixed w-full h-full inset-0 z-10 cursor-pointer bg-black opacity-70 hidden">
        </div>
        <div class="flex-1">
          <div class="shadow-inner-tabs dark:bg-foreground bg-white">
            <div class="flex flex-wrap">
            </div>
          </div>

          <!-- content-start  -->
          <div class="pl-5 pb-5 pt-5">
            <div class="grid 2xl:grid-cols-3 xl:grid-cols-2 grid-cols-1 gap-7 mb-12">
              <?php foreach ($datas as $data) { ?>
                <a href="<?= base_url('dashboard/spbu/') . $data->id ?>" class="overflow-hidden rounded-lg group">
                  <div class="relative overflow-hidden">
                    <img class="w-full group-hover:scale-105 overflow-hidden transition-all h-80 object-cover rounded-t-lg" src="<?= base_url('uploads/station/') . $data->image ?>" alt="" />
                    <div class="absolute bottom-0 top-1/2 flex items-start flex-col justify-end left-0 pb-5 pl-5  pt-2 card-linear-gradient w-full">
                      <div class="flex text-white items-center mb-2">
                        <h2 class="text-xl capitalize font-semibold mr-2">
                          <?= $data->nama ?>
                        </h2>
                      </div>
                      <p class="text-sm font-normal text-white mb-4"><?= $data->alamat ?></p>
                    </div>
                  </div>
                  <div class="flex flex-wrap justify-between p-6 bg-gray-100 dark:bg-foreground rounded-b-lg">
                    <button type="button" class="text-gray-500 hover:text-pink-600">
                      Lihat
                    </button>
                  </div>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>