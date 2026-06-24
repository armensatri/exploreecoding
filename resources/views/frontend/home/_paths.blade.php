<section class="px-3 mt-32">
  <div class="mx-auto text-center">
    <h2
      class="text-2xl font-bold tracking-normal text-gray-800 uppercase sm:text-3xl">
      path
      <span
        class="text-transparent bg-linear-to-r from-blue-500 to-sky-300 bg-clip-text">
        course
      </span>
    </h2>
  </div>

  <p
    class="max-w-2xl mx-auto mt-3 text-lg text-center text-gray-700 xl:mt-5 xl:text-xl">
    Pilihan path course menuntun perjalanan belajarmu dari awal melalui pembelajaran bertahap dan terstruktur
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
          @foreach ($paths->take(5) as $path)
            <div class="w-full hs-carousel-slide">
              {{-- <div
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
                    class="shadow-sm inline-flex items-center gap-x-1.5 py-0.5 px-1.5 rounded-md text-2xs font-medium bg-blue-100 tracking-wide border border-gray-500">
                    {{ $path->sp }}
                  </span>
                </div>
              </div> --}}

              <div class="">
                <div class="w-full p-10 bg-linear-to-t from-blue-200 to-sky-100 rounded-b-3xl h-max rounded-2xl">
                  <!-- Header -->
                  <div class="flex items-start gap-3">
                    <!-- Avatar -->
                    <img
                      src="/image/default.png"
                      class="object-cover -ml-2 border border-gray-300 rounded-full w-14 h-14"
                    />

                    <div class="flex-1">
                      <h2 class="mt-2.5 text-base font-semibold uppercase text-gray-800">
                        {{ $path->name }}
                      </h2>

                      <!-- Rating -->
                      <div class="flex items-center gap-2 mt-2">
                        <span class="flex items-center gap-1 px-2 py-0.5 text-white bg-green-600 rounded-xs text-xs">
                          ★ 5.0
                        </span>

                        <span class="text-[11px] border border-gray-300 bg-gray-200 text-gray-500 rounded-xs py-px px-2">
                            {{ $path->sp }}.{{ $path->created_at
                              ->locale('id')
                              ->translatedFormat('dmy')
                            }}{{ date('y') }}
                        </span>
                      </div>
                    </div>
                  </div>

                  <!-- Info -->
                  <div class="mt-4 text-[11px] text-gray-500">
                    <div class="flex flex-col gap-1">
                      <span class="mt-3 text-[17px] text-gray-700 line-clamp-3">
                        {{ $path->description }}
                      </span>
                    </div>
                  </div>

                  <!-- Tags -->
                  <div class="gap-2 mt-4 space-y-2 ">
                    <div class="flex items-center w-full gap-3">
                      <span class="text-[14px] text-gray-700 whitespace-nowrap tracking-wide">
                          🔹roadmaps
                      </span>

                      <div class="flex-1 tracking-wide border-t border-gray-400 border-dotted">
                      </div>

                      <span class="text-[13px] tracking-tight text-gray-700 truncate whitespace-nowrap">
                          5
                        </span>
                    </div>

                    <div class="flex items-center w-full gap-3">
                      <span class="text-[14px] text-gray-700 whitespace-nowrap tracking-wide">
                          🔹playlists
                      </span>

                      <div class="flex-1 tracking-wide border-t border-gray-400 border-dotted">
                      </div>

                      <span class="text-[13px] tracking-tight text-gray-700 truncate whitespace-nowrap">
                          20
                        </span>
                    </div>

                    <div class="flex items-center w-full gap-3">
                      <span class="text-[14px] text-gray-700 whitespace-nowrap tracking-wide">
                          🔹posts/materi
                      </span>

                      <div class="flex-1 tracking-wide border-t border-gray-400 border-dotted">
                      </div>

                      <span class="text-[13px] tracking-tight text-gray-700 truncate whitespace-nowrap">
                          256
                        </span>
                    </div>
                  </div>

                  <!-- Bottom -->
                  <div class="flex items-center justify-between mt-5">
                    <!-- Price -->
                    <div>
                      <p class="text-sm font-bold text-gray-700">
                        $75/h
                      </p>

                      <p class="text-gray-400 text-2xs">
                        Online/Offline
                      </p>
                    </div>

                    <!-- Button -->
                    <button
                      class="px-5 py-3 text-xs font-semibold text-white bg-blue-600 rounded-full shadow-md hover:bg-blue-700">
                      Book Consultation
                    </button>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <button type="button"
      class="absolute p-2 -translate-y-1/2 bg-blue-300 border border-gray-600 rounded-full shadow cursor-pointer -left-2.5 top-1/2 hover:bg-blue-500 hover:text-white hs-carousel-prev">
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
      class="absolute p-2 -translate-y-1/2 bg-blue-300 border border-gray-600 rounded-full shadow cursor-pointer -right-2.5 top-1/2 hover:bg-blue-500 hover:text-white hs-carousel-next">
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

    <div class="flex justify-center mt-5">
      <a href="">
        <button
          class="px-5 py-2 text-base font-semibold tracking-wide text-black bg-blue-300 border border-gray-400 shadow-sm cursor-pointer rounded-[14px] hover:bg-blue-600 hover:text-white">
          Semua path course
        </button>
      </a>
    </div>
  </div>
</section>
