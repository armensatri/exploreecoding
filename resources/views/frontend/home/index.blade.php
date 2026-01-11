@extends('frontend.template.main')

@section('content-frontend')
  <div class="relative px-6 bg-sky-100 isolate pt-14 lg:px-8">
    <div class="py-8">

      <div class="flex items-center justify-center px-2 py-2 text-base text-center text-red-800 bg-red-200 rounded-lg sm:bg-yellow-200 md:bg-green-200 lg:bg-purple-200 xl:bg-sky-200 fixed-top">
      </div>

      @include('frontend.home._hero')

      @include('frontend.home._count')

      @include('frontend.home._paths')

      @include('frontend.home._populer')

      @include('frontend.home._tipscoding')

      @include('frontend.home._join')

      @include('frontend.home._question')
    </div>
  </div>
@endsection
