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
                    <div class="py-1 mb-1 text-lg font-semibold tracking-normal">
                      {{ $path->name }}
                    </div>

                    <p class="text-[15px] tracking-wide text-gray-700 line-clamp-2">
                      {{ $path->description }}
                    </p>
                  </div>

                  <div class="hidden gap-4 mt-3 xl:items-center xl:flex xl:flex-row">
                    <div class="flex items-center gap-2">
                      <div class="px-1.5 text-sm tracking-wide text-gray-800 bg-gray-100 rounded-lg">
                        roadmaps
                      </div>

                      <div class="text-xs tracking-wide text-blue-600 ">
                        {{-- {{ $path->roadmaps->count() }} --}} 20
                      </div>
                    </div>

                    <div class="flex items-center gap-2">
                      <div class="px-1.5 text-sm tracking-wide text-gray-800 bg-gray-100 rounded-lg">
                        playlists
                      </div>

                      <div class="text-xs tracking-wide text-blue-600">
                        {{-- {{ $path->roadmaps->count() }} --}} 40
                      </div>
                    </div>

                    <div class="flex items-center gap-2">
                      <div class="px-1.5 text-sm tracking-wide text-gray-800 bg-gray-100 rounded-lg">
                        posts
                      </div>

                      <div class="text-xs tracking-wide text-blue-600">
                        {{-- {{ $path->roadmaps->count() }} --}} 120
                      </div>
                    </div>
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
