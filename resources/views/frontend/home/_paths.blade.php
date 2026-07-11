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
          @foreach ($paths as $path)
            <div class="w-full hs-carousel-slide">
              <div class="">
                <div class="w-full px-10 py-6 bg-linear-to-t from-blue-200 to-sky-100 rounded-b-3xl h-max rounded-2xl">
                  <div class="flex items-start gap-3">
                    <img
                      src="/image/default.png"
                      class="object-cover w-20 h-20 -ml-2 border border-gray-300 rounded-full"
                    />

                    <div class="flex-1">
                      <h2 class="mt-2.5 text-base font-semibold uppercase text-gray-800">
                        {{ $path->name }}
                      </h2>

                      <div class="flex items-center gap-2 mt-2">
                        <span class="flex items-center text-[11px] border border-gray-300 bg-gray-200 text-gray-600 rounded-md py-px px-2">
                          <svg xmlns="http://www.w3.org/2000/svg"
                            width="14"
                            height="14"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            class="mr-1 text-gray-600 bi bi-eye">
                            <path
                              d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"
                            />
                            <path
                              d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"
                            />
                          </svg>

                          <span class="text-[11px] text-gray-600">
                            {{ \App\Helpers\CountNumber::short($path->pathviews_count) }}
                          </span>
                        </span>

                        <span class="text-[11px] border border-gray-300 bg-gray-200 text-gray-600 rounded-md py-px px-2">
                          {{ $path->id }}.{{ $path->sp }}.{{ $path->created_at
                            ->locale('id')
                            ->translatedFormat('dmy')
                          }}{{ date('y') }}
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="w-max mt-3 gap-1 px-2 py-0.5 text-white bg-green-600 rounded-[5px] text-xs">
                    ★ 5.0
                  </div>

                  <div>
                    <div class="flex flex-col gap-1">
                      <span class="mt-3 text-[17px] text-gray-700 line-clamp-3">
                        {{ $path->description }}
                      </span>
                    </div>
                  </div>

                  <div class="gap-2 mt-4 space-y-2 ">
                    <div class="flex items-center w-full gap-3">
                      <span class="text-[14px] text-gray-700 whitespace-nowrap tracking-wide">
                        🔹roadmaps
                      </span>

                      <div class="flex-1 tracking-wide border-t border-gray-400 border-dotted">
                      </div>

                      <span class="mr-2.5 text-[13px] tracking-tight text-gray-700 truncate whitespace-nowrap">
                        {{ $path->roadmaps_count }}
                      </span>
                    </div>

                    <div class="flex items-center w-full gap-3">
                      <span class="text-[14px] text-gray-700 whitespace-nowrap tracking-wide">
                        🔹playlists
                      </span>

                      <div class="flex-1 tracking-wide border-t border-gray-400 border-dotted">
                      </div>

                      <span class="mr-2.5 text-[13px] tracking-tight text-gray-700 truncate whitespace-nowrap">
                        {{ $path->playlists_count }}
                      </span>
                    </div>

                    <div class="flex items-center w-full gap-3">
                      <span class="text-[14px] text-gray-700 whitespace-nowrap tracking-wide">
                        🔹posts/materi
                      </span>

                      <div class="flex-1 tracking-wide border-t border-gray-400 border-dotted">
                      </div>

                      <span class="mr-2.5 text-[13px] tracking-tight text-gray-700 truncate whitespace-nowrap">
                        {{ $path->posts_count }}
                      </span>
                    </div>
                  </div>

                  <div class="flex items-center justify-between w-full mt-5 gap-x-5 md:gap-y-3.5 lg:gap-x-5 md:flex-col lg:flex-row">
                    <div class="w-full p-0.75 bg-white rounded-[11px] border border-gray-400 md:w-3/4 lg:w-full">
                      <a href=""
                        class="block w-full px-5 py-2 text-[14px] font-semibold text-center rounded-[10px] tracking-wider
                        {{ $path->status->bg }}
                        {{ $path->status->text }}">
                        {{ $path->status->name }}
                      </a>
                    </div>

                    <div class="w-full p-0.75 bg-white rounded-[11px] border border-gray-400">
                      <div class="block w-full px-5 py-2 text-[14px]
                        font-semibold text-center text-white bg-blue-600 rounded-[10px] shadow-md hover:bg-blue-700 tracking-wide">
                        Show course
                      </div>
                    </div>
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
