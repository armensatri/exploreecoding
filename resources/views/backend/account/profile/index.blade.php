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
        <div class="breadcrumb">
          @include('backend.xbreadcrumb.profile.index')
        </div>

        <div class="w-full max-w-5xl mx-auto">
          <div class="bg-white rounded-3xl shadow-sm overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3">
              <div
                class="flex flex-col items-center justify-start py-14 px-5 text-center border-b md:border-b-0 md:border-r border-slate-200">
                <div class="mb-3 rounded-full">
                  <img  src="{{ Auth::user()->image
                    ? asset('storage/' . Auth::user()->image)
                    : asset('backend/img/user/user.png') }}"
                    alt="image"
                    class="object-cover object-top border-4 border-green-500 rounded-full sm:w-28 sm:h-28 w-24 h-24 xl:w-28 xl:h-28"
                  />
                </div>

                <h2 class="text-xl sm:text-[22px] md:text-[18px] tracking-wide uppercase font-bold text-slate-700">
                  {{ $user->name }}
                </h2>

                <div class="text-base tracking-wide text-slate-500">
                  Member since {{ $user->created_at->diffForHumans() }}
                </div>

                <div class="mt-2 mb-12">
                  <span class="text-[12px] sm:text-[14px] md:text-[12px] tracking-wide uppercase font-medium px-2 py-1 rounded-full
                  {{ $user->role->bg }} {{ $user->role->text }}">
                    role access {{ $user->role->name }}
                  </span>
                </div>

                <a href="{{ route('profile.edit', $user->username) }}"
                  class="w-fit inline-flex items-center justify-center uppercase px-3 py-1 font-medium text-sm mb-2
                  bg-blue-200 text-black border-gray-400 rounded-[8px]
                  border hover:bg-blue-600 hover:text-white">
                  <i class="mr-1.5 bi bi-pencil-square"></i>
                  Edit profile
                </a>

                <a href="{{ route('sosmeds.edit', $user->username) }}"
                  class="mt-28 w-fit inline-flex items-center justify-center uppercase px-3 py-1 font-medium text-sm mb-2 bg-blue-200 text-black border-gray-400
                  rounded-[8px] border hover:bg-blue-600
                  hover:text-white">
                  <i class="mr-1.5 bi bi-pencil-square"></i>
                  Create or edit Sosmed
                </a>

                <div
                  class="mb-3 mt-1 uppercase tracking-tighter font-semibold text-xl text-slate-800">
                  My social media
                </div>

                <div class="flex flex-wrap items-center gap-2">
                  <div class="flex flex-wrap gap-3 items-center justify-center">
                    @include('backend.account.profile._index-sosmed')
                  </div>
                </div>
              </div>

              <div class="md:col-span-2 p-5 sm:p-6">
                <section class="md:mt-10">
                  <div class="mb-2 tracking-tighter font-semibold text-2xl text-slate-800">
                    Bio singkat
                  </div>

                  <p class="text-[17px] ml-1 text-gray-500">
                    {{ $user->bio ?: '--' }}
                  </p>
                </section>

                <section class="xl:mt-10 mt-10">
                  <div class="mb-2 tracking-tighter font-semibold text-2xl text-slate-800">
                    Data profile
                  </div>

                  <div class="flex items-center gap-4 mt-4">
                    <div class="text-[17px] ml-1 w-34 text-gray-600">
                      Username
                    </div>

                    <div class="bg-gray-50 px-1.5 py-0.5 rounded-sm text-slate-600">
                      <span>@</span>{{ $user->username }}
                    </div>
                  </div>

                  <div class="flex items-center gap-4 mt-4">
                    <div class="text-[17px] ml-1 w-34 text-gray-600">
                      Email
                    </div>

                    <div class="bg-gray-50 px-1.5 py-0.5 rounded-sm text-slate-600">
                      {{ $user->email }}
                    </div>
                  </div>

                  <div class="flex items-center gap-4 mt-4">
                    <div class="text-[17px] ml-1 w-34 text-gray-600">
                      Gender
                    </div>

                    <div class="bg-gray-50 px-1.5 py-0.5 rounded-sm text-slate-600">
                      {{ $gender?->name ?: '-' }}
                    </div>
                  </div>

                  <div class="flex items-center gap-4 mt-4">
                    <div class="text-[17px] ml-1 w-34 text-gray-600">
                      Authenticate
                    </div>

                    <div class="px-2 py-px rounded-full text-[15px]
                    {{ $user->statusOnOf()['bg'] }}
                    {{ $user->statusOnOf()['text'] }}">
                      {{ $user->statusOnOf()['statusOnOf'] }}
                    </div>
                  </div>

                  <div class="flex items-center gap-4 mt-4">
                    <div class="text-[17px] ml-1 w-34 text-gray-600">
                      Status member
                    </div>

                    <div class="px-2 py-px rounded-full text-[15px]
                    {{ $user->status()['bg'] }}
                    {{ $user->status()['text'] }}">
                      {{ $user->status()['status'] }}
                    </div>
                  </div>

                  <div class="flex items-center gap-4 mt-4">
                    <div class="text-[17px] ml-1 w-34 text-gray-600">
                      Province
                    </div>

                    <div class="bg-gray-50 px-1.5 py-0.5 rounded-sm text-slate-600">
                      {{ $user->province?->name ?: '-' }}
                    </div>
                  </div>

                  <div class="flex items-center gap-4 mt-4">
                    <div class="text-[17px] ml-1 w-34 text-gray-600">
                      City
                    </div>

                    <div class="bg-gray-50 px-1.5 py-0.5 rounded-sm text-slate-600">
                      {{ $user->city?->name ?: '-'}}
                    </div>
                  </div>

                  <div class="flex items-center gap-4 mt-4">
                    <div class="text-[17px] ml-1 w-34 text-gray-600">
                      District
                    </div>

                    <div class="bg-gray-50 px-1.5 py-0.5 rounded-sm text-slate-600">
                      {{ $user->district?->name ?: '-' }}
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
