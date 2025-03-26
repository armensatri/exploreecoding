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
              status - {{ $status->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-data
              name="Id"
              :var="$status->id"
            />

            <x-show-data
              name="Create"
              :var="$status->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Update"
              :var="$status->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Publish"
              :var="$status->created_at->diffForHumans()"
            />

            <x-show-data
              name="Sorting"
              :var="$status->ss"
            />

            <x-show-background
              name="Name"
              :bg="$status->bg"
              :text="$status->text"
              :var="$status->name"
            />

            <x-show-data
              name="Url"
              :var="$status->url"
            />

            <x-show-data
              name="Bacground"
              :var="$status->bg"
            />

            <x-show-data
              name="Text"
              :var="$status->text"
            />

            <x-show-data
              name="Description"
              :var="$status->description"
            />

            <x-show-action
              name="Action"
              :edit="route('statuses.edit', $status->url)"
              :delete="route('statuses.destroy', $status->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
