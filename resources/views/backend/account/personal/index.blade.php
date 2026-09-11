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

      <section class="w-full px-4 mt-8 mb-5">
        @include('backend.xbreadcrumb.personal.index')

        <div class="x-border">
          <div class="flex flex-col items-center text-center">
            <div class="mb-3 rounded-full">
                  <img  src="{{ Auth::user()->image
                    ? asset('storage/' . Auth::user()->image)
                    : asset('backend/img/user/user.png') }}"
                    alt="image"
                    class="object-cover object-top border-4 border-green-500 rounded-full sm:w-28 sm:h-28 w-24 h-24 xl:w-28 xl:h-28"
                  />
                </div>

                <h2 class="text-xl sm:text-[22px] tracking-wide uppercase font-bold text-gray-800">
                  {{ $user->name }}
                </h2>

            <div
              class="py-2 text-[18px] font-normal tracking-tighter text-gray-600 md:text-xl xl:text-[20px] mx-auto lg:max-w-2xl">
              {{ $user->bio ?: '- tidak ada bio' }}
            </div>

            <div
              class="mb-3 mt-10 uppercase tracking-tighter font-semibold text-xl text-slate-800">
              Follow my sosmed
            </div>

            <div class="flex flex-wrap items-center gap-2">
              <div
                class="flex flex-wrap gap-3 items-center justify-center">
                @include('backend.account.personal._index-sosmed')
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
