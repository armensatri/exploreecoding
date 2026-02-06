@extends('frontend.template.main')

@section('content-frontend')
  <div class="relative px-6 bg-sky-100 isolate pt-14 lg:px-8">
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

        <p
          class="mx-auto mt-4 text-xl text-center text-gray-700">
          Kumpulan artikel exploreecoding berisi tips coding praktis panduan sederhana dan wawasan pengembangan pengetahuan
        </p>
      </div>
    </div>

    <div class="py-20">
      <section class="px-4 py-10 mx-auto max-w-7xl">
        <div class="mb-8">
          <h1 class="text-3xl font-bold text-gray-900 lg:text-4xl">
            Semua <span class="text-blue-500">tips</span>
          </h1>
          <p class="max-w-2xl mt-3 ml-2 text-lg text-gray-600">
            Artikel -- <span class="text-blue-600">tips coding</span> -- untuk pengembangan wawasan dan pengetahuan
          </p>
        </div>

        <div class="flex flex-wrap items-center gap-1 mb-10">
          <a href="">
            <button class="flex items-center cursor-pointer pl-3 pr-1.5 py-1.5 rounded-[10px] border text-[15px] font-medium text-blue-600 border-blue-400 bg-gray-100 tracking-wide hover:text-black hover:bg-gray-200">
              <img src="{{ asset('frontend/img/explore/app-laravel.png') }}" alt="" class="w-4.5 h-4.5 mr-1"> Laravel <span class="px-1.5 py-0.5 text-black bg-gray-100 rounded-md text-[11px] ml-1 border border-gray-400 tracking-wider">129</span>
            </button>
          </a>
        </div>

        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
          @foreach ($tipscodings as $tipscoding)
            <div class="p-5 transition border border-gray-300 rounded-[20px]">
              <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                  <img
                    src="{{ asset('frontend/img/user/user.png') }}"
                    alt="author"
                    class="object-cover border border-gray-300 rounded-full w-9 h-9"
                  />
                  <span class="text-[15px] font-medium text-gray-600">
                    @anonimouse
                  </span>
                </div>

                <div class="flex items-center text-xs text-gray-600">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-1 bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
</svg>100.K
                </div>
              </div>

              <h3 class="mt-4 ml-1 mb-2 text-[17px] font-semibold text-gray-900">
                {{ Str::words(strip_tags($tipscoding->title), 4) }}
              </h3>

              <p class="mb-4 ml-1 font-medium text-[15px] text-gray-600">
                Belajar bagaimana membuat dashboard, front page di inertia.js.
              </p>

              <div class="flex flex-wrap items-center gap-2">
                <span class="px-2 py-0.5 text-[13px] font-medium text-blue-600 rounded-lg bg-gray-200 tracking-wide border border-blue-400"><i class="bi bi-tags"></i> {{ $tipscoding->category->name }}</span>
                <span class="px-2 py-0.5 text-sm font-medium text-white rounded-md bg-blue-600 tracking-wide shadow-sm">
                  Baca
                  <i class="ml-1 text-xs bi bi-box-arrow-up-right"></i>
                </span>
              </div>
            </div>
          @endforeach
        </div>

        <div class="grid mt-16 md:flex lg:justify-center md:items-center">
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
