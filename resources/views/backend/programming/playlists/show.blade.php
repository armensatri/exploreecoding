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
              playlist - {{ $playlist->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-data
              name="Id"
              :var="$playlist->id"
            />

            <x-show-data
              name="Create"
              :var="$playlist->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Update"
              :var="$playlist->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Publish"
              :var="$playlist->created_at->diffForHumans()"
            />

            <x-show-data
              name="Roadmap"
              :var="$playlist->roadmap->name"
            />

            <x-show-data
              name="Sorting"
              :var="$playlist->spl"
            />

            <x-show-data
              name="Name"
              :var="$playlist->name"
            />

            <x-show-data
              name="Slug"
              :var="$playlist->slug"
            />

            <x-show-data
              name="Url"
              :var="$playlist->url"
            />

            <x-show-data
              name="Views"
              :var="$playlist->views"
            />

            <x-show-background
              name="Status"
              :bg="$playlist->status->bg"
              :text="$playlist->status->text"
              :var="$playlist->status->name"
            />

            <x-show-data
              name="Description"
              :var="$playlist->description"
            />

            <x-show-image
              name="Image"
              :asset="$playlist->image"
              asset-default="/image/default.png"
            />

            <x-show-action
              name="Action"
              :edit="route('playlists.edit', $playlist->url)"
              :delete="route('playlists.destroy', $playlist->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
