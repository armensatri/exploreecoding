@extends('frontend.template.main')

@section('content-frontend')
  <div class="relative px-6 bg-sky-100 pt-14 lg:px-8">
    <div class="mt-16">
      <div class="mx-auto max-w-7xl">
        @include('frontend.xbreadcrumb.category.index')
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
          Kumpulan
          <span class="text-blue-600">
            semua categori
          </span>
          exploreecoding berisi
          <span class="text-blue-600">
            tips coding
          </span>
          praktis panduan sederhana dan wawasan pengembangan pengetahuan
        </p>
      </div>
    </div>

    <div class="py-20">
      <section class="px-4 py-10 mx-auto max-w-7xl">
        <div class="py-5 text-center">
          <div class="mx-auto text-center">
            <h3 class="text-lg font-bold text-gray-900 uppercase">
              Tips semua
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

        <div
          class="flex flex-wrap items-center justify-center gap-3">
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
      </section>
    </div>
  </div>
@endsection
