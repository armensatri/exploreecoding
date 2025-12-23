<section class="px-6 mt-32">
        <div class="max-w-6xl mx-auto text-center">
          <h2 class="text-2xl font-bold text-gray-800 uppercase md:text-3xl">
            Populer
            <span class="text-transparent bg-linear-to-r from-blue-500 to-sky-300 bg-clip-text">
              paths course
            </span>
          </h2>

          <p class="mt-3 text-[17px] text-gray-600 max-w-2xl mx-auto">
            Path course yang banyak di kunjungi pengguna untuk belajar skill populer dengan materi terarah dan mudah dipahami
          </p>
        </div>

         <div data-hs-carousel='{
          "loadingClasses": "opacity-0",
          "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer",
          "slidesQty": { "xs": 1, "md": 2, "lg": 3 }}'
          class="relative w-full px-2 mx-auto max-w-7xl">
          <div class="overflow-hidden hs-carousel">
            <div class="relative mt-10 mb-10">
              <div class="flex transition-transform duration-700 hs-carousel-body gap-x-6">
                @foreach ($paths->take(3) as $path)
                  <div class="w-full hs-carousel-slide">
                    <div class="flex flex-col justify-center h-full p-8 text-center bg-linear-to-t from-blue-200 to-sky-100 rounded-b-3xl">
                      <div class="flex items-center justify-center mx-auto bg-blue-100 border border-gray-600 rounded-full size-14">
                        <img src="{{ asset('image/default.png') }}"
                          alt="image"
                          class="size-full"
                        />
                      </div>
                      <h3 class="mt-2 text-lg font-semibold">
                        {{ $path->name }}
                      </h3>
                      <p class="mt-1 text-gray-600 line-clamp-2">
                        {{ $path->description }}
                      </p>

                      <div class="flex gap-4 mx-auto mt-5">
                        <div>
                          <span class="shadow-sm inline-flex items-center gap-x-1.5 py-0.75 px-3 rounded-[10px] text-sm font-medium {{ $path->status->text }} {{ $path->status->bg }} dark:bg-white dark:text-neutral-800 border border-gray-500">
                            {{ $path->status->name }}
                          </span>
                        </div>
                        <div>
                          @if ($path->status->name === 'explore')
                            <a href="">
                              <span class="shadow-sm inline-flex items-center gap-x-1.5 py-0.75 px-3 rounded-[10px] text-sm font-medium bg-blue-300 hover:bg-blue-400 text-black cursor-pointer dark:text-neutral-800 border border-gray-500">
                                show course
                              </span>
                            </a>
                          @else
                            <span class="shadow-sm inline-flex items-center gap-x-1.5 py-0.75 px-3 rounded-[10px] text-sm font-medium bg-blue-300 text-black dark:text-neutral-800 border border-gray-500">
                              no course
                            </span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="flex items-center justify-center gap-4 mx-auto -mt-4">
                      <div>
                        <span class="shadow-sm inline-flex items-center gap-x-1.5 py-0.5 px-1.5 rounded-md text-[10px] font-medium bg-blue-100 dark:bg-white tracking-wide dark:text-neutral-800 border border-gray-500">
                          {{ $path->sp }}
                        </span>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          <!-- BUTTON PREV -->
          <button
            type="button"
            class="absolute left-0 p-2 text-black -translate-y-1/2 bg-blue-300 border border-gray-600 rounded-full shadow cursor-pointer xl:hidden hover:text-white hs-carousel-prev top-1/2 hover:bg-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-short size-4" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
            </svg>
          </button>

          <!-- BUTTON NEXT -->
          <button
            type="button"
            class="absolute right-0 p-2 text-black -translate-y-1/2 bg-blue-300 border border-gray-600 rounded-full shadow cursor-pointer xl:hidden hover:text-white hs-carousel-next top-1/2 hover:bg-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-right-short size-4" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
            </svg>
          </button>

          <!-- DOTS -->
        </div>
      </section>
