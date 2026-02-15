@extends('frontend.template.main')

@section('content-frontend')
  <div class="relative px-6 bg-sky-100 pt-14 lg:px-8">
    <div class="mt-16">
      <div class="mx-auto max-w-7xl">
        @include('frontend.xbreadcrumb.tipscoding.category')
      </div>
    </div>

    <div class="max-w-2xl mx-auto mt-32 xl:max-w-4xl">
      <div class="text-center">
        <div class="mx-auto text-center">
          <h2
            class="text-2xl font-bold tracking-normal text-gray-800 uppercase sm:text-3xl">
            <span
              class="text-transparent bg-linear-to-r from-green-500 to-emerald-300 bg-clip-text">
              Tips coding
            </span>
          </h2>
        </div>

        <p class="mx-auto mt-4 text-xl text-center text-gray-700">
          Kumpulan semua artikel exploreecoding berisi
          <span class="text-blue-500">
            category
          </span>
          tips coding
          <span class="text-blue-500">
            {{ $category->name }}
          </span>
        </p>
      </div>
    </div>

    <div class="py-20">
      <section class="px-4 py-10 mx-auto max-w-7xl">
        <div class="py-5 text-center">
          <div class="mx-auto text-center">
            <h3 class="text-lg font-bold text-gray-900 uppercase">
              Tips
              <span class="text-blue-500">
                categori
              </span>
            </h3>
          </div>
        </div>

        <div class="flex justify-center mb-10">
          <a href="{{ route('ec-tipscoding.index') }}">
            <button
              class="flex items-center cursor-pointer pl-3 pr-1.5 py-1.5 rounded-[10px] border text-[15px] font-medium text-blue-600 border-blue-400 bg-gray-100 tracking-wide hover:text-black hover:bg-gray-200 whitespace-nowrap">

              <img src="{{ asset(
                'frontend/img/navigation/tipscodings.png') }}"
                alt="image"
                class="object-contain w-4 h-4 mr-2 rounded-sm"
              />

              <span
                class="mr-1 text-green-600 underline underline-offset-2 decoration-green-500">
                Index semua tips
              </span>

              <span
                class="px-1.5 py-0.5 text-green-700 bg-gray-100 rounded-md text-[11px] ml-1 border border-gray-400 tracking-wider">
                {{ $totaltipscodings }} Tips
              </span>
            </button>
          </a>
        </div>

        <div class="flex items-center justify-center mb-5 lg:mb-0">
          <div class="lg:hidden">
            <button type="button"
              id="dropdownDefaultButton"
              data-dropdown-toggle="dropdown"
              class="inline-flex items-center justify-center bg-blue-200
              px-3 py-1.5 rounded-xl border border-gray-400 text-black
              font-medium text-base tracking-wide cursor-pointer hover:bg-blue-300">

              Select category

              <svg xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                viewBox="0 0 16 16"
                class="ml-1.5 text-black bi bi-arrow-down-circle">
                <path fill-rule="evenodd"
                  d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"
                />
              </svg>
            </button>

            <div id="dropdown"
              class="z-10 hidden overflow-hidden bg-gray-100 border border-gray-400 shadow-lg w-max rounded-[20px]">
              <div class="max-h-87.5 overflow-y-auto p-4">
                <ul class="space-y-4 text-sm font-medium text-body">
                  @foreach ($categories->take(15) as $categori)
                    <li>
                      <div class="flex justify-center">
                        <a href="{{ route(
                          'ec-tipscoding.category', $categori->url) }}">
                          <button
                            class="flex items-center cursor-pointer pl-3 pr-1.5 py-1.5 rounded-[10px] border text-[15px] font-medium text-blue-600 border-blue-400 bg-gray-100 tracking-wide hover:text-black hover:bg-gray-200 whitespace-nowrap">

                            <span class="text-[8px] text-black">
                              {{ $categori->sc }}
                            </span>

                            @if ($categori->image)
                              <img src="{{ asset($categori->image) }}"
                                alt="category"
                                class="w-4.5 h-4.5 mr-1"
                              />
                            @else
                              <img src="{{ asset('image/default.png') }}"
                                alt="default"
                                class="w-5.5 h-5.5 mr-1"
                              />
                            @endif

                            <span
                              class="mr-1 hover:underline hover:underline-offset-2 hover:decoration-blue-500">
                              {{ $categori->name }}
                            </span>

                            <span
                              class="px-1.5 py-0.5 text-black bg-gray-100 rounded-md text-[11px] ml-1 border border-gray-400 tracking-wider">
                              {{ $categori->tipscodings_count }} Tips
                            </span>
                          </button>
                        </a>
                      </div>
                    </li>
                  @endforeach
                </ul>

                <div class="w-full p-2">
                  <a href=""
                    class="block w-full">
                    <button
                      class="w-full py-2 mb-1 mt-6 text-base font-semibold tracking-wide text-center text-black bg-blue-300 border border-gray-400 shadow-sm rounded-[14px] hover:bg-blue-600 hover:text-white">
                      Semua category
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="flex-wrap items-center justify-center hidden gap-3 lg:mb-5 lg:flex">
          @foreach ($categories->take(15) as $categori)
            <div>
              <a href="{{ route(
                'ec-tipscoding.category', $categori->url) }}">
                <button
                  class="flex items-center cursor-pointer pl-3 pr-1.5 py-1.5 rounded-[10px] border text-[15px] font-medium text-blue-600 border-blue-400 bg-gray-100 tracking-wide hover:text-black hover:bg-gray-200">

                  <span class="mr-1 text-[8px] text-black">
                    {{ $categori->sc }}
                  </span>

                  @if ($categori->image)
                    <img
                      src="{{ asset($categori->image) }}"
                      alt="category"
                      class="w-4.5 h-4.5 mr-1"
                    />
                  @else
                    <img
                      src="{{ asset('image/default.png') }}"
                      alt="default"
                      class="w-5.5 h-5.5 mr-1"
                    />
                  @endif

                  <span
                    class="mr-1 hover:underline hover:underline-offset-2 hover:decoration-blue-500">
                    {{ $categori->name }}
                  </span>

                  <span
                    class="px-1.5 py-0.5 text-black bg-gray-100 rounded-md text-[11px] ml-1 border border-gray-400 tracking-wider">
                    {{ $categori->tipscodings_count }} Tips
                  </span>
                </button>
              </a>
            </div>
          @endforeach
        </div>

        {{-- sebagian category --}}
        <div class="justify-center hidden lg:flex">
          <a href="">
            <button
              class="px-5 py-2 text-base font-semibold tracking-wide text-black bg-blue-300 border border-gray-400 shadow-sm cursor-pointer rounded-[14px] hover:bg-blue-600 hover:text-white">
              Semua category
            </button>
          </a>
        </div>

        <div class="mb-3 mt-28">
          <h1 class="text-3xl font-bold text-gray-900 lg:text-4xl">
            Semua tips
            <span class="text-blue-500">
              {{ $category->name }}
            </span>
          </h1>

          <p class="max-w-3xl mt-3 ml-1 text-lg text-gray-600">
            {{ $tipscodings->total() }} Artikel -- <span class="text-blue-600">{{ $category->name }}</span> -- untuk pengembangan wawasan dan pengetahuan
          </p>

          <p class="mt-20 ml-1 text-sm tracking-wide text-gray-700">
            Halaman <span>{{ $tipscodings->currentPage() }}</span><span class="mx-px">/</span>{{ $tipscodings->lastPage() }}...
            <span class="ml-1">{{ $tipscodings->count() }}</span> data, total semua {{ $tipscodings->total() }} data
          </p>
        </div>

        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 xl:grid-cols-3">
          @foreach ($tipscodings as $tipscoding)
            <div class="p-5 transition border border-gray-300 rounded-3xl">
              <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                  <img
                    src="{{ asset('frontend/img/user/user.png') }}"
                    alt="image"
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
                <a href="{{ route(
                  'ec-tipscoding.category', $tipscoding->category->url
                  ) }}">
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
                        class="relative flex items-center px-2 py-1 text-sm font-semibold tracking-wide text-black bg-blue-300 border border-gray-400 rounded-lg shadow-xs hs-tooltip-toggle hover:bg-blue-600 hover:text-white">

                        Baca

                        <i
                          class="ml-1 text-xs bi bi-box-arrow-up-right">
                        </i>

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
          @endforeach
        </div>

        <div class="flex items-center justify-center mt-16">
          @if ($tipscodings->lastPage() > 1)
            <x-pagination
              :pagination="$tipscodings"
            />
          @endif
        </div>
      </section>
    </div>
  </div>
@endsection
