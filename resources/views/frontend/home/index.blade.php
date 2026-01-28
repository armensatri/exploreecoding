@extends('frontend.template.main')

@section('content-frontend')
  <div class="relative px-6 bg-sky-100 isolate pt-14 lg:px-8">
    <div class="py-8">

      <div class="flex items-center justify-center px-2 py-2 text-base text-center rounded-lg sm:bg-red-200 md:bg-yellow-200 lg:bg-green-200 xl:bg-blue-200 fixed-top">
      </div>

      @include('frontend.home._hero')

      @include('frontend.home._count')

      @include('frontend.home._paths')

      @include('frontend.home._populer')

      @include('frontend.home._join')

      @include('frontend.home._tipscoding')

      @include('frontend.home._question')
    </div>
  </div>
@endsection
