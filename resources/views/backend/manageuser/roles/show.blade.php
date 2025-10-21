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
          @include('backend.sbreadcrumb.roles.show')
        </div>

        <div class="x-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              role - {{ $role->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-var
              name="Id"
              :var="$role->id"
            />

            <x-show-var
              name="Url"
              :var="$role->url"
            />

            <x-show-var
              name="Create"
              :var="$role->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Update"
              :var="$role->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Publish"
              :var="$role->created_at->diffForHumans()"
            />

            <x-show-var
              name="Sorting"
              :var="$role->sr"
            />

            <x-show-background
              name="Name"
              :bg="$role->bg"
              :text="$role->text"
              :var="$role->name"
            />

            <x-show-var
              name="Slug"
              :var="$role->slug"
            />

            <x-show-var
              name="Background"
              :var="$role->bg"
            />

            <x-show-var
              name="Text color"
              :var="$role->text"
            />

            <x-show-var
              name="Description"
              :var="$role->description"
            />

            <x-show-var
              name="Guard"
              :var="$role->guard_name"
            />

            <x-show-action
              name="Action"
              :indexs="route('roles.index')"
              :edit="route('roles.edit', $role->url)"
              :delete="route('roles.destroy', $role->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
