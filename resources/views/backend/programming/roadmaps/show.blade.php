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
              roadmap - {{ $roadmap->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-data
              name="Id"
              :var="$roadmap->id"
            />

            <x-show-data
              name="Create"
              :var="$roadmap->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Update"
              :var="$roadmap->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Publish"
              :var="$roadmap->created_at->diffForHumans()"
            />

            <x-show-data
              name="Path"
              :var="$roadmap->path->name"
            />

            <x-show-data
              name="Sorting"
              :var="$roadmap->sr"
            />

            <x-show-data
              name="Name"
              :var="$roadmap->name"
            />

            <x-show-data
              name="Slug"
              :var="$roadmap->slug"
            />

            <x-show-data
              name="Url"
              :var="$roadmap->url"
            />

            <x-show-data
              name="Views"
              :var="$roadmap->views"
            />

            <x-show-background
              name="Status"
              :bg="$roadmap->status->bg"
              :text="$roadmap->status->text"
              :var="$roadmap->status->name"
            />

            <x-show-data
              name="Description"
              :var="$roadmap->description"
            />

            <x-show-image
              name="Image"
              :asset="$roadmap->image"
              asset-default="/image/default.png"
            />

            <x-show-action
              name="Action"
              :edit="route('roadmaps.edit', $roadmap->url)"
              :delete="route('roadmaps.destroy', $roadmap->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
