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
            @include('backend.sbreadcrumb.playlists.create')
          </div>

          <form action="{{ route('playlists.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="x-border">
              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="name"
                  label-name="Playlist..name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  value-default=""
                  error="name"
                  placeholder="Masukkan nama playlist"
                />

                <x-input
                  label-for="slug"
                  label-name="Playlist..slug"
                  type="text"
                  id="slug"
                  name="slug"
                  value-old="slug"
                  value-default=""
                  error="slug"
                  placeholder="Masukkan slug playlist"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-select
                  label-for="roadmap_id"
                  label-name="Playlist..roadmap"
                  id="roadmap_id"
                  name="roadmap_id"
                  :items="$roadmaps"
                  value-old="roadmap_id"
                  value-default=""
                  error="roadmap_id"
                  placeholder="Select roadmap for playlist"
                />

                <x-input
                  label-for="spl"
                  label-name="Playlist..spl"
                  type="text"
                  id="spl"
                  name="spl"
                  value-old="spl"
                  value-default=""
                  error="spl"
                  placeholder="Masukkan sorting playlist"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-select
                  label-for="status_id"
                  label-name="Playlist..status"
                  id="status_id"
                  name="status_id"
                  :items="$statuses"
                  value-old="status_id"
                  value-default=""
                  error="status_id"
                  placeholder="Select status for playlist"
                />

                <x-input-textarea
                  label-for="description"
                  label-name="Playlist..description"
                  id="description"
                  name="description"
                  value-old="description"
                  value-default=""
                  error="description"
                  placeholder="Masukkan description playlist"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-image
                  label-for="image"
                  label-name="Playlist..image"
                  type="file"
                  id="image"
                  name="image"
                  error="image"
                />

                <x-input-image-preview
                  label-for="image"
                  label-name="Playlist..preview"
                  :image="$playlist->image"
                />
              </div>

              <div class="mt-8">
                <x-button-create-data
                  button-name="Create data"
                />
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
@endsection
