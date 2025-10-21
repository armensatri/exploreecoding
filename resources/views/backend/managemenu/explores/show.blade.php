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
          @include('backend.sbreadcrumb.explores.show')
        </div>

        <div class="x-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              explore - {{ $explore->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-var
              name="Id"
              :var="$explore->id"
            />

            <x-show-var
              name="Url"
              :var="$explore->url"
            />

            <x-show-var
              name="Create"
              :var="$explore->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Update"
              :var="$explore->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Publish"
              :var="$explore->created_at->diffForHumans()"
            />

            <x-show-var
              name="Sorting"
              :var="$explore->se"
            />

            <x-show-var
              name="Name"
              :var="$explore->name"
            />

            <x-show-var
              name="Slug"
              :var="$explore->slug"
            />

            <x-show-var
              name="Route"
              :var="$explore->routee"
            />

            <x-show-var
              name="Button"
              :var="$explore->button_name"
            />

            <x-show-var
              name="Description"
              :var="$explore->description"
            />

            <x-show-action
              name="Action"
              :indexs="route('explores.index')"
              :edit="route('explores.edit', $explore->url)"
              :delete="route('explores.destroy', $explore->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
