<section class="px-3 mt-32">
  <div class="mx-auto text-center">
    <h2
      class="text-2xl font-bold tracking-normal text-gray-800 uppercase sm:text-3xl">
      tips
      <span
        class="text-transparent bg-linear-to-r from-blue-500 to-sky-300 bg-clip-text">
        coding
      </span>
    </h2>
  </div>

  <p
    class="max-w-2xl mx-auto mt-3 text-lg text-center text-gray-700">
    Kumpulan artikel exploreecoding berisi tips coding praktis panduan sederhana dan wawasan pengembangan pengetahuan
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
          @foreach ($tipscodings->take(5) as $tipscoding)
            <div class="w-full hs-carousel-slide">
              <div
                class="flex flex-col items-center h-full p-8 bg-linear-to-t from-blue-200 to-sky-100 rounded-b-3xl">
                <div class="">
                  <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-2">
                      <img
                        src="{{ asset('frontend/img/user/user.png') }}"
                        alt="author"
                        class="object-cover border border-gray-300 rounded-full w-9 h-9"
                      />
                      <span class="text-[15px] font-medium text-gray-600">
                        <span>@</span>{{ $tipscoding->user->username }}
                      </span>
                    </div>

                    <div class="flex items-center text-xs text-gray-600">
                      <svg xmlns="http://www.w3.org/2000/svg"
                        `width="16"
                        height="16"
                        fill="currentColor"
                        viewBox="0 0 16 16"
                        class="mr-1 bi bi-eye">
                        <path
                          d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"
                        />
                        <path
                          d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"
                        />
                      </svg>
                      100.K
                    </div>
                  </div>

                  <div class="flex items-center">
                    <div class="hs-tooltip [--placement:auto]">
                      <div
                        class="relative hs-tooltip-toggle mt-2 ml-1 mb-2 text-[17px] font-semibold text-gray-800 hover:underline hover:underline-offset-2 hover:decoration-blue-500 tracking-tight">

                        <a href="">
                          {{ Str::words(strip_tags($tipscoding->title), 4) }}
                        </a>

                        <span
                          class="absolute z-10 invisible px-2 py-px text-sm tracking-wide text-black bg-blue-200 border border-blue-300 rounded-lg hs-tooltip-content hs-tooltip-shown:visible max-w-max">
                          {{ $tipscoding->title }}
                        </span>
                      </div>
                    </div>
                  </div>

                  <p class="mb-4 ml-1 font-medium text-[15px] text-gray-600">
                    <span class="block sm:hidden">
                      {{ Str::words(strip_tags($tipscoding->excerpt), 10) }}
                    </span>

                    <span class="hidden sm:block md:hidden">
                      {{ Str::words(strip_tags($tipscoding->excerpt), 16) }}
                    </span>

                    <span class="hidden md:block lg:hidden">
                      {{ Str::words(strip_tags($tipscoding->excerpt), 8) }}
                    </span>

                    <span class="hidden lg:block xl:hidden">
                      {{ Str::words(strip_tags($tipscoding->excerpt), 12) }}
                    </span>

                    <span class="hidden xl:block">
                      {{ Str::words(strip_tags($tipscoding->excerpt), 9) }}
                    </span>
                  </p>

                  <div class="flex items-center gap-2">
                    <a href="">
                      <span
                        class="flex items-center px-2 py-1 text-[13px] font-medium text-blue-600 rounded-lg bg-white tracking-wider border border-blue-400 hover:bg-gray-200 hover:text-black">
                        <img
                          src="{{ asset('frontend/img/explore/app-laravel.png') }}"
                          alt="image"
                          class="w-4 h-4 mr-1"
                        />

                        <span
                          class="underline underline-offset-2 decoration-blue-500">
                          {{ $tipscoding->category->name }}
                        </span>
                      </span>
                    </a>

                    <a href="">
                      <div class="flex items-center">
                        <div class="hs-tooltip [--placement:auto]">
                          <div
                            class="relative flex items-center px-2 py-1 text-sm font-medium tracking-wider text-white bg-blue-600 rounded-lg shadow-sm hs-tooltip-toggle hover:bg-blue-700">

                            Baca

                            <i class="ml-1 text-xs bi bi-box-arrow-up-right"></i>

                            <span
                              class="absolute z-10 invisible px-2 py-px text-sm tracking-wide text-black bg-blue-200 border border-blue-300 rounded-lg hs-tooltip-content hs-tooltip-shown:visible max-w-max">
                              {{ $tipscoding->title }}
                            </span>
                          </div>
                        </div>
                      </div>
                    </a>
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
      <a href="{{ route('ec-tipscoding.index') }}">
        <button
          class="px-5 py-2 text-base font-semibold tracking-wide text-black bg-blue-300 border border-gray-400 shadow-sm cursor-pointer rounded-[14px] hover:bg-blue-600 hover:text-white">
          ✅Semua tips coding
        </button>
      </a>
    </div>
  </div>
</section>
