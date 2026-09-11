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

      <section class="w-full px-4 mt-8 mb-5">
        @include('backend.xbreadcrumb.dashboard.index')

        <div class="x-border">
          <div class="p-2 text-center">
            <div class="mb-4 text-xl md:text-2xl lg:text-3xl font-extrabold tracking-wider text-gray-900 uppercase">
              welcome back {{ $user->name }}
            </div>

            <div
              class="text-[18px] font-normal tracking-tighter text-gray-600 md:text-xl xl:text-[22px] mx-auto lg:max-w-2xl">
              Platform belajar pemrograman untuk menguasai coding dari dasar, kuasai teknologi programming melalui latihan konsisten proyek nyata serta pembelajaran coding yang terstruktur
            </div>

            <div class="{{ $user->role->bg }}
              mt-8 inline-block rounded-full tracking-wider">
              <div class="px-3.5 py-1.5 text-sm uppercase font-medium
                {{ $user->role->text }}">
                role access {{ $user->role->name }}
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
