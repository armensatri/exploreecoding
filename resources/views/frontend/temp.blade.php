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
              Contact
            </span>
          </h2>
        </div>

        <p
          class="mx-auto mt-4 text-xl text-center text-gray-700">
          Hubungi contact exploreecoding untuk pertanyaan, kolaborasi, masukan, atau bantuan seputar pembelajaran coding dan pengembangan skill teknologi digital.
        </p>
      </div>
    </div>

    <div class="py-20">
      <div class="gap-x-20">
        //
      </div>
    </div>
  </div>
@endsection
