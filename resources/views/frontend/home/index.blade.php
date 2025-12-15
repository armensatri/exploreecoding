@extends('frontend.template.main')

@section('content-frontend')
  <div class="relative px-6 bg-sky-100 isolate pt-14 lg:px-8">
    <div class="py-8">
      @include('frontend.home._hero')

      @include('frontend.home._count')

      @include('frontend.home._paths')

      @include('frontend.home._populer')
    </div>
  </div>
@endsection
