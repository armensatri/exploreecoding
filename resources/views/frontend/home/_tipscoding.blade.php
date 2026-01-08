<section class="px-6 mt-32">
        <div class="max-w-6xl mx-auto text-center">
          <h2 class="text-2xl font-bold text-gray-800 uppercase md:text-3xl">
            Tips
            <span class="text-transparent bg-linear-to-r from-blue-500 to-sky-300 bg-clip-text">
              coding
            </span>
          </h2>

          <p class="mt-3 text-[17px] text-gray-600 max-w-2xl mx-auto">
            Kumpulan artikel exploreecoding berisi tips coding praktis panduan sederhana dan wawasan pengembangan skill
          </p>
        </div>

         <div data-hs-carousel='{
          "loadingClasses": "opacity-0",
          "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer",
          "slidesQty": { "xs": 1, "sm": 2, "md": 2, "lg": 3 }}'
          class="relative w-full px-2 mx-auto max-w-7xl">
          <div class="overflow-hidden hs-carousel">
            <div class="relative mt-10 mb-10">
              <div class="flex transition-transform duration-700 hs-carousel-body gap-x-3">
                @foreach ($paths as $path)
                <div class="px-3 hs-carousel-slide">
                    <div class="h-full py-4">
                        <div class="relative w-full mx-auto overflow-hidden bg-linear-to-t from-blue-200 to-sky-100 rounded-b-3xl">
                          <div class="p-4">
                            <div class="">
                                <div class="relative overflow-hidden bg-yellow-400 h-44 rounded-xl">
                                    <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&q=80&w=500"
                                         alt="Course Image"
                                         class="object-cover w-full h-full opacity-90">
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="flex items-center mb-4">
                                    <span class="px-3 py-1 text-xs font-bold tracking-wider text-blue-600 uppercase rounded-lg bg-blue-50">
                                        tips html
                                    </span>
                                </div>

                                 <h3 class="mt-2 text-lg font-semibold tracking-wide text-slate-800 line-clamp-2">
                                  Lorem ipsum dolor sit amet. dolor sit amet.
                                  Lorem ipsum dolor sit amet. dolor sit amet.
                                </h3>

                                {{-- <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/100?u=scott" alt="Avatar" class="w-10 h-10 rounded-full ring-2 ring-gray-100">
                                        <span class="text-sm font-semibold text-gray-600">Scott Fowler</span>
                                    </div>
                                    <button class="px-4 py-2 text-sm font-bold text-gray-700 transition-all border-2 border-gray-200 rounded-xl hover:bg-blue-600 hover:text-white hover:border-blue-600">
                                        View
                                    </button>
                                </div>

                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <div class="flex items-center gap-2 text-gray-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span class="text-xs font-bold uppercase">10 Lessons</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-gray-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span class="text-xs font-bold">4h 20m</span>
                                    </div>
                                </div> --}}
                            </div>
                          </div>
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
            class="absolute left-0 p-2 text-black -translate-y-1/2 bg-blue-300 border border-gray-600 rounded-full shadow cursor-pointer hover:text-white hs-carousel-prev top-1/2 hover:bg-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-short size-4" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
            </svg>
          </button>

          <!-- BUTTON NEXT -->
          <button
            type="button"
            class="absolute right-0 p-2 text-black -translate-y-1/2 bg-blue-300 border border-gray-600 rounded-full shadow cursor-pointer hover:text-white hs-carousel-next top-1/2 hover:bg-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-right-short size-4" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
            </svg>
          </button>

          <!-- DOTS -->
           <!-- DOTS -->
          <div class="flex justify-center mt-4 hs-carousel-pagination gap-x-2"></div>

          <!-- DOTS -->
          <div class="flex justify-center mt-5">
            <a href="{{ route('path') }}">
              <button class="px-5 py-2 text-base font-semibold tracking-wide text-black bg-blue-300 border border-gray-400 shadow-sm cursor-pointer rounded-[14px] hover:bg-blue-600 hover:text-white">
                Semua tips coding
              </button>
            </a>
          </div>
        </div>
      </section>
