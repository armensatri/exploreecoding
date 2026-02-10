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

        <p
          class="mx-auto mt-4 text-xl text-center text-gray-700">
          Kumpulan artikel exploreecoding berisi tips coding praktis panduan sederhana dan wawasan pengembangan pengetahuan
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
                category
              </span>
            </h3>
          </div>
        </div>

        @include('frontend.tipscoding.tipscoding.index-semua-tips')

        @include('frontend.tipscoding.tipscoding.index-select-category')

        @include('frontend.tipscoding.tipscoding.index-category')

        @include('frontend.tipscoding.tipscoding.index-description')

        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 xl:grid-cols-3">
          @foreach ($tipscodings as $tipscoding)
            @include('frontend.tipscoding.tipscoding.index-tips-card')
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
