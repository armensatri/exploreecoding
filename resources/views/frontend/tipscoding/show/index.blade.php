@extends('frontend.template.main')

@section('content-frontend')
  <div class="relative px-6 bg-sky-100 pt-14 lg:px-8">
    <div class="mt-16">
      <div class="mx-auto max-w-7xl">
        @include('frontend.xbreadcrumb.show.index')
      </div>
    </div>

    <div class="max-w-2xl mx-auto mt-32 xl:max-w-4xl">
      <div class="text-center">
        <div class="mx-auto text-center">
          <h2 class="text-2xl font-bold tracking-normal text-gray-800 uppercase sm:text-3xl">
            <span class="text-transparent bg-linear-to-r from-green-500 to-emerald-300 bg-clip-text">
              Tips coding
            </span>
          </h2>
        </div>

        <p class="mx-auto mt-4 text-xl text-center text-gray-700">
          show
          <span class="text-blue-600">
            tips
          </span>
          exploreecoding berisi tips coding praktis panduan sederhana dan wawasan pengembangan pengetahuan
        </p>
      </div>
    </div>

    <div class="">
      <div class="gap-x-20">
        <section class="px-4 py-10 mt-20 mx-auto max-w-7xl">
          <div class="py-5 text-center">
            <div class="mx-auto text-center">
              <h3 class="text-lg font-bold text-gray-900 uppercase">
                Kembali
                <span class="text-blue-500">
                  ke
                </span>
              </h3>
            </div>
          </div>

          @include(
            'frontend.tipscoding.show._index-tipscoding-or-category'
          )

          <div class="flex items-center justify-center px-2 py-2 text-base text-center rounded-lg sm:bg-red-200 md:bg-yellow-200 lg:bg-green-200 xl:bg-blue-200 fixed-top">
          </div>

          <div>
            <div class="max-w-7xl mx-auto mt-20">
              <div class="grid grid-cols-1 gap-10 lg:grid-cols-12">
                @include('frontend.tipscoding.show._index-content')
                @include('frontend.tipscoding.show._index-sidebar')
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection
