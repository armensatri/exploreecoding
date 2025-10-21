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
        @include('backend.sbreadcrumb.changepassword.index')

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

          <div class="flex justify-center mt-20">
            <a href="{{ route('changepassword.edit', $user->url) }}"
              class="uppercase px-3 py-[4px] font-medium text-sm mb-2
              bg-blue-200 text-black border-gray-400 rounded-[10px]
              border hover:bg-blue-600 hover:text-white">
              <i class="mr-1.5 bi bi-pencil-square"></i>
              change password
            </a>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
