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
            @include('backend.sbreadcrumb.roadmaps.edit')
          </div>

          <form action="{{ route('roadmaps.update', $roadmap->url) }}"
            method="POST"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <div class="x-border">
              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="name"
                  label-name="Roadmap..name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  :value-default="$roadmap->name"
                  error="name"
                  placeholder="Masukkan nama roadmap"
                />

                <x-input
                  label-for="slug"
                  label-name="Roadmap..slug"
                  type="text"
                  id="slug"
                  name="slug"
                  value-old="slug"
                  :value-default="$roadmap->slug"
                  error="slug"
                  placeholder="Masukkan slug roadmap"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="sr"
                  label-name="Roadmap..sr"
                  type="text"
                  id="sr"
                  name="sr"
                  value-old="sr"
                  :value-default="$roadmap->sr"
                  error="sr"
                  placeholder="Masukkan sorting roadmap"
                />

                <x-input-select
                  label-for="path_id"
                  label-name="Roadmap..path"
                  id="path_id"
                  name="path_id"
                  :items="$paths"
                  value-old="path_id"
                  :value-default="$roadmap->path_id"
                  error="path_id"
                  placeholder="Select path for roadmap"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-select
                  label-for="status_id"
                  label-name="Roadmap..status"
                  id="status_id"
                  name="status_id"
                  :items="$statuses"
                  value-old="status_id"
                  :value-default="$roadmap->status_id"
                  error="status_id"
                  placeholder="Select status for roadmap"
                />

                <x-input-textarea
                  label-for="description"
                  label-name="Roadmap..description"
                  id="description"
                  name="description"
                  value-old="description"
                  :value-default="$roadmap->description"
                  error="description"
                  placeholder="Masukkan description roadmap"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-image
                  label-for="image"
                  label-name="Roadmap..image"
                  type="file"
                  id="image"
                  name="image"
                  error="image"
                />

                <x-input-image-preview
                  label-for="image"
                  label-name="Roadmap..preview"
                  :image="$roadmap->image"
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
