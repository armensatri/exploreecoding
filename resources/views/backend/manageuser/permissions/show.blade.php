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
          @include('backend.sbreadcrumb.permissions.show')
        </div>

        <div class="x-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              permission - {{ $permission->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-var
              name="Id"
              :var="$permission->id"
            />

            <x-show-var
              name="Url"
              :var="$permission->url"
            />

            <x-show-var
              name="Create"
              :var="$permission->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Update"
              :var="$permission->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Publish"
              :var="$permission->created_at->diffForHumans()"
            />

            <x-show-var
              name="Name"
              :var="$permission->name"
            />

            <x-show-var
              name="Slug"
              :var="$permission->slug"
            />

            <x-show-var
              name="Guard"
              :var="$permission->guard_name"
            />

            <x-show-action
              name="Action"
              :indexs="route('permissions.index')"
              :edit="route('permissions.edit', $permission->url)"
              :delete="route('permissions.destroy', $permission->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
