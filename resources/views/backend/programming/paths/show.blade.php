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
          @include('backend.sbreadcrumb.paths.show')
        </div>

        <div class="x-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              path - {{ $path->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-var
              name="Id"
              :var="$path->id"
            />

            <x-show-var
              name="Url"
              :var="$path->url"
            />

            <x-show-var
              name="Create"
              :var="$path->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Update"
              :var="$path->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Publish"
              :var="$path->created_at->diffForHumans()"
            />

            <x-show-background
              name="Status"
              :bg="$path->status->bg"
              :text="$path->status->text"
              :var="$path->status->name"
            />

            <x-show-var
              name="Sorting"
              :var="$path->sp"
            />

            <x-show-var
              name="Name"
              :var="$path->name"
            />

            <x-show-var
              name="Slug"
              :var="$path->slug"
            />

            <x-show-var
              name="Descriptiom"
              :var="$path->description"
            />

            <x-show-image
              name="Image"
              :asset="$path->image"
              :asset-default="asset('image/default.png')"
            />

            <x-show-action
              name="Action"
              :indexs="route('paths.index')"
              :edit="route('paths.edit', $path->url)"
              :delete="route('paths.destroy', $path->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
