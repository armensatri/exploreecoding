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

      <section class="w-full px-3 mt-8 mb-5">
        <div class="breadcrumb">
          @include('backend.xbreadcrumb.monitoring.index')
        </div>

        <div class="x-border">
          <div class="flex flex-col items-center text-center">
            <x-md-header
              :image="asset('/image/default.png')"
              alt="image"
              title="Data monitoring"
              description="Monitoring data system"
            />
          </div>

          <div class="w-full mt-12">
            <div class="flex justify-center gap-2 px-4 py-4 mx-auto border-b border-gray-200">
              @include('backend.managedata.monitoring._navigation')
            </div>

            <div class="max-w-lg p-8 mx-auto text-center lg:max-w-2xl">
              <div
                class="text-lg font-normal tracking-tighter text-gray-600 xl:text-xl">
                Monitoring data system adalah sistem yang digunakan untuk memantau, mengelola, dan memonitor data secara terstruktur agar informasi dapat dipantau dengan mudah dan akurat.
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
