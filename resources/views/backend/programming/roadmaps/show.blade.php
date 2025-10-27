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
          @include('backend.sbreadcrumb.roadmaps.show')
        </div>

        <div class="x-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              roadmap - {{ $roadmap->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-var
              name="Id"
              :var="$roadmap->id"
            />

            <x-show-var
              name="Url"
              :var="$roadmap->url"
            />

            <x-show-var
              name="Create"
              :var="$roadmap->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Update"
              :var="$roadmap->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Publish"
              :var="$roadmap->created_at->diffForHumans()"
            />

            <x-show-background
              name="Status"
              :bg="$roadmap->status->bg"
              :text="$roadmap->status->text"
              :var="$roadmap->status->name"
            />

            <x-show-var
              name="path"
              :var="$roadmap->path->name"
            />

            <x-show-var
              name="Sorting"
              :var="$roadmap->sr"
            />

            <x-show-var
              name="Name"
              :var="$roadmap->name"
            />

            <x-show-var
              name="Slug"
              :var="$roadmap->slug"
            />

            <x-show-var
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
              :indexs="route('roadmaps.index')"
              :edit="route('roadmaps.edit', $roadmap->url)"
              :delete="route('roadmaps.destroy', $roadmap->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
