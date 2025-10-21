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
        @include('backend.sbreadcrumb.personal.index')

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
        </div>
      </section>
    </div>
  </div>
@endsection
