@extends('frontend.template.main')

@section('content-frontend')
  <div class="relative px-6 bg-sky-100 pt-14 lg:px-8">
    <div class="mt-16">
      <div class="mx-auto max-w-7xl">
        @include('frontend.xbreadcrumb.tipscoding.index')
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
            semua artikel
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
              Tips
              <span class="text-blue-500">
                categori
              </span>
            </h3>
          </div>
        </div>

        @include('frontend.tipscoding.tipscoding._index.index')

        @include('frontend.tipscoding.tipscoding._index.select-category')

        @include('frontend.tipscoding.tipscoding._index.sebagian-category')

        <div class="mb-3 mt-28">
          <h1 class="text-3xl font-bold text-gray-900 lg:text-4xl">
            Semua
            <span class="text-blue-500">
              tips
            </span>
          </h1>

          <p class="max-w-3xl mt-3 ml-1 text-lg text-gray-600">
            {{ $totaltipscodings }} Artikel -- <span class="text-blue-600">semua tips coding</span> -- untuk pengembangan wawasan dan pengetahuan
          </p>

          <p class="mt-20 ml-1 text-sm tracking-wide text-gray-700">
            Halaman <span>{{ $tipscodings->currentPage() }}</span><span class="mx-px">/</span>{{ $tipscodings->lastPage() }}...
            <span class="ml-1">{{ $tipscodings->count() }}</span> data, total semua {{ $tipscodings->total() }} data
          </p>
        </div>

        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 xl:grid-cols-3">
          @foreach ($tipscodings as $tipscoding)
            @include('frontend.tipscoding.tipscoding._index.card')
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
