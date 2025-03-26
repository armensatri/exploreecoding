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

      <section class="w-full px-4 mt-8 mb-5">
        <div class="app-cse-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              path - {{ $path->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-data
              name="Id"
              :var="$path->id"
            />

            <x-show-data
              name="Create"
              :var="$path->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Update"
              :var="$path->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Publish"
              :var="$path->created_at->diffForHumans()"
            />

            <x-show-data
              name="Sorting"
              :var="$path->sp"
            />

            <x-show-data
              name="Name"
              :var="$path->name"
            />

            <x-show-data
              name="Slug"
              :var="$path->slug"
            />

            <x-show-data
              name="Url"
              :var="$path->url"
            />

            <x-show-data
              name="Views"
              :var="$path->views"
            />

            <x-show-background
              name="Status"
              :bg="$path->status->bg"
              :text="$path->status->text"
              :var="$path->status->name"
            />

            <x-show-data
              name="Description"
              :var="$path->description"
            />

            <x-show-image
              name="Image"
              :asset="$path->image"
              asset-default="/image/default.png"
            />

            <x-show-action
              name="Action"
              :edit="route('paths.edit', $path->url)"
              :delete="route('paths.destroy', $path->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
