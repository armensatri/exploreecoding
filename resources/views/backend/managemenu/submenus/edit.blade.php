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
        <div class="w-full">
          <form action="{{ route('submenus.update', $submenu->url) }}"
            method="POST"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <div class="app-cse-border">
              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="name"
                  label-name="Submenu..name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  :value-default="$submenu->name"
                  error="name"
                  placeholder="Masukkan nama submenu"
                />

                <x-input-select
                  label-for="menu_id"
                  label-name="Submenu..menu"
                  id="menu_id"
                  name="menu_id"
                  :items="$menus"
                  value-old="menu_id"
                  :value-default="$submenu->menu_id"
                  error="menu_id"
                  placeholder="Select menu for submenu"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="ssm"
                  label-name="Submenu..ssm"
                  type="text"
                  id="ssm"
                  name="ssm"
                  value-old="ssm"
                  :value-default="$submenu->ssm"
                  error="ssm"
                  placeholder="Masukkan sorting submenu"
                />

                <x-input
                  label-for="route"
                  label-name="Submenu..route"
                  type="text"
                  id="route"
                  name="route"
                  value-old="route"
                  :value-default="$submenu->route"
                  error="route"
                  placeholder="Masukkan route submenu"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="active"
                  label-name="Submenu..active"
                  type="text"
                  id="active"
                  name="active"
                  value-old="active"
                  :value-default="$submenu->active"
                  error="active"
                  placeholder="Masukkan active submenu"
                />

                <x-input
                  label-for="routename"
                  label-name="Submenu..route name"
                  type="text"
                  id="routename"
                  name="routename"
                  value-old="routename"
                  :value-default="$submenu->routename"
                  error="routename"
                  placeholder="Masukkan route name submenu"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input-textarea
                  label-for="description"
                  label-name="Submenu..description"
                  id="description"
                  name="description"
                  value-old="description"
                  :value-default="$submenu->description"
                  error="description"
                  placeholder="Masukkan description submenu"
                />
              </div>

              <div class="mt-8">
                <x-button-edit-data
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
