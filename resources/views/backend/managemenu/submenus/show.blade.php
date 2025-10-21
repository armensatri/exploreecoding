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
          @include('backend.sbreadcrumb.submenus.show')
        </div>

        <div class="x-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              submenu - {{ $submenu->name }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-var
              name="Id"
              :var="$submenu->id"
            />

            <x-show-var
              name="Url"
              :var="$submenu->url"
            />

            <x-show-var
              name="Create"
              :var="$submenu->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Update"
              :var="$submenu->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Publish"
              :var="$submenu->created_at->diffForHumans()"
            />

            <x-show-var
              name="Menu"
              :var="$submenu->menu->name"
            />

            <x-show-var
              name="Sorting"
              :var="$submenu->ssm"
            />

            <x-show-var
              name="Name"
              :var="$submenu->name"
            />

            <x-show-var
              name="Slug"
              :var="$submenu->slug"
            />

            <x-show-var
              name="Route"
              :var="$submenu->route"
            />

            <x-show-var
              name="Active"
              :var="$submenu->active"
            />

            <x-show-var
              name="Routename"
              :var="$submenu->routename"
            />

            <x-show-var
              name="Description"
              :var="$submenu->description"
            />

            <x-show-action
              name="Action"
              :indexs="route('submenus.index')"
              :edit="route('submenus.edit', $submenu->url)"
              :delete="route('submenus.destroy', $submenu->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
