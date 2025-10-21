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
          @include('backend.sbreadcrumb.users.show')
        </div>

        <div class="x-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              user - {{ $user->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-var
              name="Id"
              :var="$user->id"
            />

            <x-show-var
              name="Url"
              :var="$user->url"
            />

            <x-show-var
              name="Create"
              :var="$user->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Update"
              :var="$user->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Publish"
              :var="$user->created_at->diffForHumans()"
            />

            <x-show-var
              name="Name"
              :var="$user->name"
            />

            <x-show-var
              name="Username"
              :var="$user->username"
            />

            <x-show-var
              name="Email"
              :var="$user->email"
            />

            <x-show-background
              name="Role"
              :bg="$user->role->bg"
              :text="$user->role->text"
              :var="$user->role->name"
            />

            <x-show-image
              name="Image"
              :asset="$user->image"
              asset-default="/image/default.png"
            />

            <x-show-action
              name="Action"
              :indexs="route('users.index')"
              :edit="route('users.edit', $user->url)"
              :delete="route('users.destroy', $user->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
