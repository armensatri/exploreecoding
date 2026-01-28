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
    "slidesQty": { "xs": 1, "sm": 2, "xl": 3 }
    }' class="relative w-full mx-auto max-w-7xl">
    <div class="overflow-hidden hs-carousel">
      <div class="relative mt-10 mb-10">
        <div
          class="flex transition-transform duration hs-carousel-body gap-x-6">
          @foreach ($paths->take(5) as $path)
            <div class="w-full hs-carousel-slide">
              <div
                class="flex flex-col items-center h-full p-8 bg-linear-to-t from-blue-200 to-sky-100 rounded-b-3xl">
                <div>
                  <div class="">
                    <div
                      class="relative overflow-hidden bg-yellow-400 h-44 rounded-xl">
                      <img
                        src="https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&q=80&w=500"
                        alt="Course Image"
                        class="object-cover w-full h-full opacity-90"
                      />
                    </div>
                  </div>

                  <div class="mt-3">
                    <div class="flex items-center mb-4">
                      <span
                        class="px-3 py-1 text-xs font-bold tracking-wider text-blue-600 uppercase rounded-lg bg-blue-50">
                        <i class="bi bi-tags"></i>tips html
                      </span>
                    </div>

                    <h3
                      class="mt-2 text-lg font-semibold tracking-wide text-slate-800 line-clamp-2">
                      Lorem ipsum dolor sit amet. dolor sit amet.
                      Lorem ipsum dolor sit amet. dolor sit amet.
                    </h3>
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
      <a href="{{ route('path') }}">
        <button
          class="px-5 py-2 text-base font-semibold tracking-wide text-black bg-blue-300 border border-gray-400 shadow-sm cursor-pointer rounded-[14px] hover:bg-blue-600 hover:text-white">
          Semua tips coding
        </button>
      </a>
    </div>
  </div>
</section>
