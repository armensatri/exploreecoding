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
          <div class="flex items-center">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
              @foreach ($paths as $path)
                <div class="w-full p-8 border shadow rounded-3xl">
                  <div class="flex items-center justify-between mb-2 text-gray-500">
                    <div>
                      <img src="{{ $path->image ? asset(
                          'storage/' . $path->image
                        ) : '/image/default.png' }}"
                        alt="path"
                        class="rounded-md size-12"
                      />
                    </div>

                    <span class="text-sm">
                      <span class="font-serif tracking-wide">
                        Path
                      </span>

                      {{ $path->sp }}
                    </span>
                  </div>

                  <div class="card-body">
                    <div class="py-1 mb-1 font-sans text-lg font-bold tracking-normal text-gray-800">
                      {{ $path->name }}
                    </div>

                    <p class="text-sm tracking-wide text-gray-700 line-clamp-2">
                      {{ $path->description }}
                    </p>
                  </div>

                  <div class="hidden gap-4 mt-3 xl:items-center xl:flex xl:flex-row">
                    <div class="flex items-center gap-2">
                      <div class="px-1.5 text-sm tracking-wide text-gray-800 bg-gray-100 rounded-md">
                        roadmaps
                      </div>

                      <div class="text-xs tracking-wide text-blue-600 ">
                        {{ $path->roadmaps->count() }}
                      </div>
                    </div>

                    <div class="flex items-center gap-2">
                      <div class="px-1.5 text-sm tracking-wide text-gray-800 bg-gray-100 rounded-md">
                        playlists
                      </div>

                      <div class="text-xs tracking-wide text-blue-600">
                        {{
                          $path->roadmaps->sum(function($r) {
                            return $r->playlists->count();
                          })
                        }}
                      </div>
                    </div>

                    <div class="flex items-center gap-2">
                      <div class="px-1.5 text-sm tracking-wide text-gray-800 bg-gray-100 rounded-md">
                        posts
                      </div>

                      <div class="text-xs tracking-wide text-blue-600">
                        {{
                          $path->roadmaps->sum(function($r) {
                            return $r->playlists->sum(function($p) {
                              return $p->posts->count();
                            });
                          })
                        }}
                      </div>
                    </div>
                  </div>

                  <div class="flex items-center gap-4 mt-8">
                    <a href="{{ route('silabus.show', $path->slug) }}">
                      <div class="shadow inline-flex items-center px-2.5 py-[5px] text-sm text-black bg-blue-200 rounded-xl hover:bg-blue-600 hover:text-white tracking-wide gap-x-2 border border-gray-400 cursor-pointer">
                        show silabus
                      </div>
                    </a>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endSection
