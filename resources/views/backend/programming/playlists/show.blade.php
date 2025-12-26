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
          @include('backend.sbreadcrumb.playlists.show')
        </div>

        <div class="x-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              Playlist - {{ $playlist->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-var
              name="Id"
              :var="$playlist->id"
            />

            <x-show-var
              name="Url"
              :var="$playlist->url"
            />

            <x-show-var
              name="Create"
              :var="$playlist->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Update"
              :var="$playlist->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Publish"
              :var="$playlist->created_at->diffForHumans()"
            />

            <x-show-background
              name="Status"
              :bg="$playlist->status->bg"
              :text="$playlist->status->text"
              :var="$playlist->status->name"
            />

            <x-show-var
              name="Roadmap"
              :var="$playlist->roadmap->name"
            />

            <x-show-var
              name="Sorting"
              :var="$playlist->spl"
            />

            <x-show-var
              name="Name"
              :var="$playlist->name"
            />

            <x-show-var
              name="Slug"
              :var="$playlist->slug"
            />

            <x-show-var
              name="Description"
              :var="$playlist->description"
            />

            <x-show-image
              name="Image"
              :asset="$playlist->image"
              :asset-default="asset('image/default.png')"
            />

            <x-show-action
              name="Action"
              :indexs="route('playlists.index')"
              :edit="route('playlists.edit', $playlist->url)"
              :delete="route('playlists.destroy', $playlist->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
