@extends('backend.template.main')

@section('content-backend')
  <div class="content">
    <div class="p-4 mx-auto">
      <section class="w-full px-4 mb-2">
        <div class="app-content">
          <div class="app-content-title">
            {{ $title }}
          </div>
        </div>
      </section>

      @if (session()->has('alert'))
        @include('sweetalert::alert')
      @endif

      <section class="w-full px-4 mt-8 mb-5">
        <div class="app-cse-border">
          <div class="flex justify-center">
            <div class="max-w-md px-16 border border-gray-200 bg-gray-50 rounded-3xl">
              <div class="flex flex-col items-center px-8">

                <img src="{{ $user->image ? asset(
                  'storage/' . $user->image
                  ) : asset('/image/default.png') }}"
                  alt="profile-image"
                  class="mt-5 mb-1 rounded-full w-[250px] h-[250px] object-cover object-top"
                />

                <div class="mb-1 text-lg font-medium tracking-wide text-gray-900 uppercase">
                  {{ $user->name }}
                </div>

                <span class="text-base tracking-normal text-gray-500">
                  {{ $user->email }}
                </span>

                <div class="flex mt-4 mb-8">
                  <div class="{{ $user->role->bg }}
                    inline-block rounded-full tracking-wider">
                    <div class="px-3.5 py-1.5 text-sm uppercase font-medium
                      {{ $user->role->text }}">
                      role access {{ $user->role->name }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endSection
