@extends('backend.template.main')

@section('content-backend')
  <div class="content">
    <div class="p-4 mx-auto">
      <section class="w-full px-2 mb-2">
        <div class="content-backend">
          <div class="content-backend-title">
            {{ $title }}
          </div>
        </div>
      </section>

      <div class="alert">
        @if (session()->has('alert'))
          @include('sweetalert::alert')
        @endif
      </div>

      <section class="w-full px-3 mt-8 mb-5">
        <div class="breadcrumb">
          @include('backend.xbreadcrumb.view.index')
        </div>

        <div class="x-border">
          <div class="flex flex-col items-center text-center">
            <x-md-header
              :image="asset('/image/default.png')"
              alt="image"
              title="Data view"
              description="Monitoring data view content"
            />
          </div>

          <div class="w-full mt-12 overflow-x-auto">
            <div class="flex justify-center gap-2 px-4 py-2 mx-auto border-gray-200 sm:border-b min-w-max whitespace-nowrap">
              @include('backend.view._navigation')
            </div>
          </div>

          <div class="p-8 text-center">
            <div class="font-normal text-lg tracking-wide text-gray-600">
              Pantau jumlah view setiap konten secara real-time, analisis performa, identifikasi tren view pengunjung, dan optimalkan strategi penyajian konten secara efektif.
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
