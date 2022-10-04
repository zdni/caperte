    <!-- end wrapper -->
    <div class="font-inter dark:bg-background sticky-header-first-content">
      <div class="dark:bg-background">
        <div class="lg:hidden z-50 bg-white sticky top-20 left-0 w-full flex shadow-input p-4 dark:bg-foreground rounded-md">
          <div class="flex items-center">
            <p class="text-gray-700 text-base font-normal dark:text-gray-100">
              Filters
            </p>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 -rotate-90 text-blue-500 listing-filter-btn" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
              />
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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 close-left-sidebar" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
              </div>
            </div>
            <div class="p-5 h-5/6 overflow-y-auto">
              <form action="<?= base_url('dashboard/algorithm') ?>" method="get">
                <p class="text-gray-700 text-lg dark:text-gray-100 font-semibold mb-4">Daftar Bahan Bakar</p>
                <ul>
                  <?php foreach ($fuels as $fuel) { ?>
                    <li class="mb-2 flex items-center">
                      <input class="accent-blue-500 w-4 h-4 mr-3 border" type="checkbox" id="fuel[]" name="fuel[]" value="<?= $fuel->id ?>"/>
                      <label for="fuel[]" class="text-gray-500 dark:text-gray-300"> <?= $fuel->nama ?></label>
                    </li>
                  <?php } ?>
                </ul>
                <button type="submit" class="bg-blue-500 text-white hover:bg-blue-600 rounded-lg w-full p-3.5 mt-9 mb-4"> Cari SPBU</button>
              </form>
            </div>
          </div>

          <div class="listing-sidebar-overlay fixed w-full h-full inset-0 z-10 cursor-pointer bg-black opacity-70 hidden"></div>
          <div class="flex-1">
            <div class="shadow-inner-tabs dark:bg-foreground bg-white">
              <div class="flex flex-wrap">
              </div>
            </div>

            <!-- content-start  -->

            <!-- main content started  -->
            <div class="flex items-start">
              <div class="lg:basis-96 basis-auto lg:flex-shrink-0 flex-shrink mr-7">
                <div class="flex justify-between flex-wrap mb-3">
                  <p class="text-lg font-semibold text-gray-500 dark:text-gray-200 p-5">
                    Detail SPBU
                  </p>
                </div>
                <div class="pl-7">
                  <div class="grid lg:grid-cols-1 sm:grid-cols-2 grid-cols-1 gap-7">
                    <div id="map-1" class="cursor-pointer overflow-hidden rounded-t-lg group">
                      <div class="relative overflow-hidden">
                        <img
                          class="w-full h-80 object-cover rounded-t-lg group-hover:scale-105 transition-all"
                          src="<?= base_url('assets/client/') ?>img/Image/landing-page-image/researching.jpg"
                          alt=""
                        />
                        <div class="absolute bottom-0 top-1/2 flex items-start flex-col justify-end left-0 pb-5 pl-5 pt-2 card-linear-gradient w-full">
                          <div class="flex text-white items-center mb-2">
                            <h2 class="text-xl capitalize font-semibold mr-2">
                              Liam Ancor - Physics Trinee
                            </h2>
                          </div>
                          <p class="text-sm font-normal text-white mb-4">
                            New York, USA
                          </p>
                        </div>
                      </div>
                      <div class="flex justify-between p-6 bg-gray-100 dark:bg-foreground rounded-b-lg">
                        <a href="<?= base_url('dashboard/algorithm?station=&s=rute') ?>" class="text-gray-500 hover:text-pink-600">
                          Rute
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="map" class="lg:h-screen w-full h-full map-content"></div>
              <button type="button" class="bg-white p-4 map-btn lg:hidden shadow-front-3 items-center flex fixed bottom-7 left-1/2 -translate-x-1/2">
                <svg class="mr-2 text-blue-500" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M10.6668 4.98896C10.6668 6.16693 9.04232 8.26612 8.32899 9.11184C8.15787 9.33837 7.84232 9.33837 7.67121 9.11184C6.95788 8.26612 5.33343 6.16693 5.33343 4.98896C5.33343 3.55922 6.52676 2.40002 8.0001 2.40002C9.47343 2.40002 10.6668 3.55922 10.6668 4.98896ZM8.0001 5.67934C8.49121 5.67934 8.88899 5.29316 8.88899 4.81636C8.88899 4.33978 8.49121 3.95339 8.0001 3.95339C7.50899 3.95339 7.11121 4.33978 7.11121 4.81636C7.11121 5.29316 7.50899 5.67934 8.0001 5.67934ZM11.0579 6.27911C11.069 6.25322 11.0801 6.22733 11.0912 6.19929L13.669 5.19823C14.0201 5.06231 14.4001 5.31258 14.4001 5.67934V11.5217C14.4001 11.7331 14.2668 11.923 14.0645 12.0028L10.8445 13.252V6.72355C10.9223 6.57468 10.9934 6.42798 11.0579 6.27911ZM4.94232 6.27911C5.00676 6.42798 5.07788 6.57468 5.15565 6.72355V12.1474L2.33143 13.2455C1.98121 13.362 1.6001 13.1312 1.6001 12.7644V6.92203C1.6001 6.7106 1.73288 6.50133 1.93543 6.44092L4.65788 5.38377C4.71121 5.69013 4.8201 5.99433 4.94232 6.27911ZM8.88454 9.54333C9.19343 9.18735 9.67787 8.57679 10.1334 7.90151V13.28L5.86676 12.0956V7.90151C6.32232 8.57679 6.80676 9.18735 7.11565 9.54333C7.57121 10.1151 8.42899 10.1151 8.88454 9.54333Z"
                    fill="currentColor"
                  />
                </svg>
                Map View
              </button>
            </div>
          </div>
        </div>
      </div>