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
          @include('backend.sbreadcrumb.statuses.show')
        </div>

        <div class="x-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              status - {{ $status->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-var
              name="Id"
              :var="$status->id"
            />

            <x-show-var
              name="Url"
              :var="$status->url"
            />

            <x-show-var
              name="Create"
              :var="$status->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Update"
              :var="$status->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Publish"
              :var="$status->created_at->diffForHumans()"
            />

            <x-show-var
              name="Sorting"
              :var="$status->ss"
            />

            <x-show-background
              name="Name"
              :bg="$status->bg"
              :text="$status->text"
              :var="$status->name"
            />

            <x-show-var
              name="Slug"
              :var="$status->slug"
            />

            <x-show-var
              name="Background"
              :var="$status->bg"
            />

            <x-show-var
              name="Text color"
              :var="$status->text"
            />

            <x-show-var
              name="Description"
              :var="$status->description"
            />

            <x-show-action
              name="Action"
              :indexs="route('statuses.index')"
              :edit="route('statuses.edit', $status->url)"
              :delete="route('statuses.destroy', $status->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
