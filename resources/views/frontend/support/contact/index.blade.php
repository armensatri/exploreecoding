@extends('frontend.template.main')

@section('content-frontend')
  <div class="relative px-6 bg-sky-100 pt-14 lg:px-8">
    <div class="mt-16">
      <div class="mx-auto max-w-7xl">
        @include('frontend.xbreadcrumb.contact.index')
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
      <div class="flex justify-center gap-x-20">
        <div class="text-center">
          <h3 class="mb-2 text-lg font-semibold text-gray-900">
            WhatsApp
          </h3>

          <a href="#"
            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] bg-teal-600 text-white font-medium hover:bg-teal-700
            transition shadow-xs">
            <i class="text-lg bi bi-whatsapp"></i> ???
          </a>
        </div>

        <div class="text-center">
          <h3 class="mb-2 text-lg font-semibold text-gray-900">
            Send to mail
          </h3>

          <a href="#"
            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[10px] bg-teal-600 text-white font-medium hover:bg-teal-700
            transition shadow-xs">
            <i class="text-lg bi bi-envelope-at-fill"></i> ???
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
