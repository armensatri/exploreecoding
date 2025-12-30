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
          @include('backend.sbreadcrumb.data.index')
        </div>

        <div class="x-border">
          <div class="flex flex-col items-center text-center">
            <x-md-header
              :image="asset('/image/default.png')"
              alt="visitor"
              title="Data count"
              description="Jumlah data dalam system"
            />
          </div>

          <div class="w-full mt-12 border-b border-gray-200"></div>

          <div class="max-w-6xl mx-auto">
            <div class="mt-16">
              <div class="content">
                <div class="px-4 mx-auto text-center max-w-7xl">
                  <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 xl:grid-cols-3">
                    <x-data-card-count
                      hover="users"
                      :route="route('users.index')"
                      img="/backend/img/menu/users.jpg"
                      alt="users"
                      data-name="Data users"
                      :data-count="$users"
                    />

                    <x-data-card-count
                      hover="roles"
                      :route="route('roles.index')"
                      img="/backend/img/menu/roles.jpg"
                      alt="roles"
                      data-name="Data roles"
                      :data-count="$roles"
                    />

                    <x-data-card-count
                      hover="permissions"
                      :route="route('permissions.index')"
                      img="/backend/img/menu/permissions.jpg"
                      alt="permissions"
                      data-name="Data permissions"
                      :data-count="$permissions"
                    />

                    <x-data-card-count
                      hover="menus"
                      :route="route('menus.index')"
                      img="/backend/img/menu/menus.jpg"
                      alt="menus"
                      data-name="Data menus"
                      :data-count="$menus"
                    />

                    <x-data-card-count
                      hover="submenus"
                      :route="route('submenus.index')"
                      img="/backend/img/menu/submenus.jpg"
                      alt="submenus"
                      data-name="Data submenus"
                      :data-count="$submenus"
                    />

                    <x-data-card-count
                      hover="statuses"
                      :route="route('statuses.index')"
                      img="/backend/img/menu/statuses.jpg"
                      alt="statuses"
                      data-name="Data statuses"
                      :data-count="$statuses"
                    />

                    <x-data-card-count
                      hover="paths"
                      :route="route('paths.index')"
                      img="/backend/img/menu/paths.png"
                      alt="paths"
                      data-name="Data paths"
                      :data-count="$paths"
                    />

                    <x-data-card-count
                      hover="roadmaps"
                      :route="route('roadmaps.index')"
                      img="/backend/img/menu/roadmaps.png"
                      alt="roadmaps"
                      data-name="Data roadmaps"
                      :data-count="$roadmaps"
                    />

                    <x-data-card-count
                      hover="playlists"
                      :route="route('playlists.index')"
                      img="/backend/img/menu/playlists.png"
                      alt="playlists"
                      data-name="Data playlists"
                      :data-count="$playlists"
                    />

                    <x-data-card-count
                      hover="posts"
                      :route="route('posts.index')"
                      img="/backend/img/menu/posts.png"
                      alt="posts"
                      data-name="Data posts"
                      :data-count="$posts"
                    />

                    <x-data-card-count
                      hover="tipscodings"
                      :route="route('tipscodings.index')"
                      img="/backend/img/menu/tipscodings.png"
                      alt="tipscodings"
                      data-name="Data tipscodings"
                      :data-count="$tipscodings"
                    />

                    <x-data-card-count
                      hover="categories"
                      :route="route('categories.index')"
                      img="/backend/img/menu/categories.png"
                      alt="categories"
                      data-name="Data categories"
                      :data-count="$categories"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
