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
        <div class="w-full">
          <div class="breadcrumb">
            @include('backend.sbreadcrumb.users.edit')
          </div>

          <form action="{{ route('users.update', $user->url) }}"
            method="POST"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <div class="x-border">
              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="name"
                  label-name="User..name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  :value-default="$user->name"
                  error="name"
                  placeholder="Masukkan nama user"
                />

                <x-input
                  label-for="username"
                  label-name="User..username"
                  type="text"
                  id="username"
                  name="username"
                  value-old="username"
                  :value-default="$user->username"
                  error="username"
                  placeholder="Masukkan username user"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="email"
                  label-name="User..email"
                  type="text"
                  id="email"
                  name="email"
                  value-old="email"
                  :value-default="$user->email"
                  error="email"
                  placeholder="Masukkan email user"
                />

                <x-input-select
                  label-for="role_id"
                  label-name="User..role"
                  id="role_id"
                  name="role_id"
                  :items="$roles"
                  value-old="role_id"
                  :value-default="$user->role_id"
                  error="role_id"
                  placeholder="Select role for user"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-image
                  label-for="image"
                  label-name="User..image"
                  type="file"
                  id="image"
                  name="image"
                  error="image"
                />

                <x-input-image-preview
                  label-for="image"
                  label-name="User..preview"
                  :image="$user->image"
                />
              </div>

              <div class="mt-8">
                <x-button-update-data
                  button-name="Update data"
                />
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
@endsection
