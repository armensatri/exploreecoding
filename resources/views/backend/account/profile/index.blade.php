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
        <div class="breadcrumb">
          @include('backend.xbreadcrumb.profile.index')
        </div>

        <div class="x-border">
          <div class="flex flex-col items-center text-center">
            <x-md-header
              :image="$user->image ? asset('storage/' . $user->image) :
                asset('backend/img/user/user.png')"
              alt="image"
              :title="'@' . $user->username"
              :description="$user->email"
            />
          </div>

          <div class="text-center mt-3">
            <div class="text-3xl font-extrabold tracking-wider text-gray-900 uppercase">
              welcome back {{ $user->name }}
            </div>

            <div class="{{ $user->role->bg }}
              mt-8 inline-block rounded-full tracking-wider">
              <div class="px-3.5 py-1.5 text-sm uppercase font-medium
                {{ $user->role->text }}">
                role access {{ $user->role->name }}
              </div>
            </div>
          </div>

          <div
            class="flex flex-col items-center justify-center gap-4 mt-20 sm:flex-row">
            <a href="{{ route('profile.edit', $user->username) }}"
              class="w-fit inline-flex items-center justify-center uppercase px-3 py-1 font-medium text-sm mb-2
              bg-blue-200 text-black border-gray-400 rounded-[8px]
              border hover:bg-blue-600 hover:text-white">
              <i class="mr-1.5 bi bi-pencil-square"></i>
              Edit profile
            </a>

            <a href=""
              class="w-fit inline-flex items-center justify-center uppercase px-3 py-1 font-medium text-sm mb-2
              bg-blue-200 text-black border-gray-400 rounded-[8px]
              border hover:bg-blue-600 hover:text-white">
              <i class="mr-1.5 bi bi-pencil-square"></i>
              Edit sosmed
            </a>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
