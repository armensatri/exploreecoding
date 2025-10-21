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
          @include('backend.sbreadcrumb.navigations.show')
        </div>

        <div class="x-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              navigation - {{ $navigation->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-var
              name="Id"
              :var="$navigation->id"
            />

            <x-show-var
              name="Url"
              :var="$navigation->url"
            />

            <x-show-var
              name="Create"
              :var="$navigation->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Update"
              :var="$navigation->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Publish"
              :var="$navigation->created_at->diffForHumans()"
            />

            <x-show-var
              name="Sorting"
              :var="$navigation->sn"
            />

            <x-show-var
              name="Name"
              :var="$navigation->name"
            />

            <x-show-var
              name="Slug"
              :var="$navigation->slug"
            />

            <x-show-var
              name="Route"
              :var="$navigation->routee"
            />

            <x-show-var
              name="Button"
              :var="$navigation->button_name"
            />

            <x-show-var
              name="Description"
              :var="$navigation->description"
            />

            <x-show-action
              name="Action"
              :indexs="route('navigations.index')"
              :edit="route('navigations.edit', $navigation->url)"
              :delete="route('navigations.destroy', $navigation->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
