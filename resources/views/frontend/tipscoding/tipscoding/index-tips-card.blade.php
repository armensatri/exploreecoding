 <div class="p-5 transition border border-gray-300 rounded-3xl">
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
