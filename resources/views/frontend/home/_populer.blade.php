<section class="px-3 mt-32">
  <div class="mx-auto text-center">
    <h2
      class="text-2xl font-bold tracking-normal text-gray-800 uppercase sm:text-3xl">
      populer
      <span
        class="text-transparent bg-linear-to-r from-blue-500 to-sky-300 bg-clip-text">
        path course
      </span>
    </h2>
  </div>

  <p
    class="max-w-2xl mx-auto mt-3 text-lg text-center text-gray-700">
    Path course yang banyak di kunjungi pengguna untuk belajar skill populer dengan materi terarah dan mudah dipahami
  </p>

  <div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer",
    "slidesQty": { "xs": 1, "md": 2, "xl": 3 }
    }' class="relative w-full mx-auto max-w-7xl">
    <div class="overflow-hidden hs-carousel">
      <div class="relative mt-10 mb-10">
        <div
          class="flex transition-transform duration hs-carousel-body gap-x-6">
          @foreach ($paths->take(3) as $path)
            <div class="w-full hs-carousel-slide">
              <div
                class="flex flex-col items-center justify-center h-full p-8 text-center bg-linear-to-t from-blue-200 to-sky-100 rounded-b-3xl">
                <div
                  class="flex items-center justify-center mx-auto bg-blue-100 border border-gray-600 rounded-full size-14">
                  <img src="{{ asset('image/default.png') }}"
                    alt="image"
                    class="size-full"
                  />
                </div>

                <h3 class="mt-2 text-lg font-semibold">
                  {{ $path->name }}
                </h3>

                <p class="mt-3 text-[17px] text-gray-700 line-clamp-2">
                  {{ $path->description }}
                </p>

                <div class="mt-4 mb-2">
                  <div>
                    @if (in_array($path->status->name, [
                      'upcoming',
                      'on progress'
                      ]))
                      <span
                        class="shadow-sm inline-flex items-center gap-x-1.5 py-0.75 px-3 rounded-[10px] text-sm font-medium border border-gray-500
                        {{ $path->status->text }} {{ $path->status->bg }}">
                        {{ $path->status->name }}
                      </span>
                    @else
                      <a href=""
                        class="cursor-pointer">
                        <span
                          class="shadow-sm inline-flex items-center gap-x-1.5 py-0.75 px-3 rounded-[10px] text-sm font-medium border border-gray-500 bg-blue-300 text-blue-800 hover:bg-blue-600 hover:text-white">
                          show course
                        </span>
                      </a>
                    @endif
                  </div>
                </div>
              </div>

              <div
                class="flex items-center justify-center gap-4 mx-auto -mt-4">
                <div>
                  <span
                    class="shadow-sm inline-flex items-center gap-x-1.5 py-0.5 px-1.5 rounded-md text-[10px] font-medium bg-blue-100 tracking-wide border border-gray-500">
                    {{ $path->sp }}
                  </span>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <button type="button"
      class="absolute xl:hidden p-2 -translate-y-1/2 bg-blue-300 border border-gray-600 rounded-full shadow cursor-pointer -left-2.5 top-1/2 hover:bg-blue-500 hover:text-white hs-carousel-prev">
      <svg xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 16 16"
        class="bi bi-arrow-left-short size-5">
        <path fill-rule="evenodd"
          d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"
        />
      </svg>
    </button>

    <button type="button"
      class="absolute xl:hidden p-2 -translate-y-1/2 bg-blue-300 border border-gray-600 rounded-full shadow cursor-pointer -right-2.5 top-1/2 hover:bg-blue-500 hover:text-white hs-carousel-next">
      <svg xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 16 16"
        class="bi bi-arrow-right-short size-5">
        <path fill-rule="evenodd"
          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"
        />
      </svg>
    </button>

    <div class="flex justify-center mt-4 hs-carousel-pagination gap-x-2">
    </div>
  </div>
</section>
