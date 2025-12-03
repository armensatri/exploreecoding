@extends('frontend.template.main')

@section('content-frontend')
  <div class="relative px-6 bg-sky-100 isolate pt-14 lg:px-8">
    <div class="py-20">
      <section class="relative px-4 text-center mt-14 lg:px-0">
        <h1 class="text-3xl font-bold leading-tight tracking-normal text-gray-900 lg:text-5xl">
          <span class="text-transparent bg-linear-to-r from-blue-500 to-sky-300 bg-clip-text">Welcomeback Exploreecoding</span><br>
          <span class="text-gray-800">
            Platform belajar pemrograman untuk menguasai coding dari dasar
          </span>
        </h1>

        <p class="max-w-2xl mx-auto mt-10 text-lg text-gray-600">
          Kuasai technologi programming melalui latihan konsisten proyek nyata serta pembelajaran coding yang terarah
        </p>

        <a href="{{ route('path') }}">
          <button class="py-4 mt-8 text-lg font-semibold text-black bg-blue-200 border border-gray-400 cursor-pointer px-7 rounded-2xl hover:bg-blue-300">
            Belajar Sekarang
          </button>
        </a>
      </section>
    </div>
  </div>
@endsection
