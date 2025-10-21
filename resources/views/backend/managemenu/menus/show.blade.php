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
          @include('backend.sbreadcrumb.menus.show')
        </div>

        <div class="x-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              menu - {{ $menu->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-var
              name="Id"
              :var="$menu->id"
            />

            <x-show-var
              name="Url"
              :var="$menu->url"
            />

            <x-show-var
              name="Create"
              :var="$menu->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Update"
              :var="$menu->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Publish"
              :var="$menu->created_at->diffForHumans()"
            />

            <x-show-var
              name="Sorting"
              :var="$menu->sm"
            />

            <x-show-var
              name="Name"
              :var="$menu->name"
            />

            <x-show-var
              name="Slug"
              :var="$menu->slug"
            />

            <x-show-var
              name="Description"
              :var="$menu->description"
            />

            <x-show-action
              name="Action"
              :indexs="route('menus.index')"
              :edit="route('menus.edit', $menu->url)"
              :delete="route('menus.destroy', $menu->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
