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
        <div class="bg-white border border-gray-200 p-14 drop-shadow-sm rounded-3xl">
          <div>
            <ol class="relative border-gray-200 border-s">
              @foreach ($paths as $path)
                <li class="mb-10 ms-6">
                  <span class="absolute flex items-center justify-center w-6 h-6 text-xs bg-gray-200 rounded-full -start-3 ring-2">
                    {{ $path->sp }}
                  </span>

                  <div class="flex items-center">
                    <span class="text-sm tracking-wide font-medium px-2.5 py-0.5 rounded-xl border border-gray-400 bg-red-200 text-red-800">
                      Path {{ $path->name }}
                    </span>
                  </div>

                  <ol class="relative mt-4 ml-10 border-gray-200 border-s">
                    @foreach ($path->roadmaps as $roadmap)
                      <li class="mb-10 ms-6">
                        <span class="absolute flex items-center justify-center w-6 h-6 text-xs bg-gray-200 rounded-full -start-3 ring-2">
                          {{ $roadmap->sr }}
                        </span>

                        <div class="flex items-center">
                          <span class="text-sm tracking-wide font-medium px-2.5 py-0.5 rounded-xl border border-gray-400 bg-yellow-200 text-yellow-800">
                            Roadmap {{ $roadmap->name }}
                          </span>
                        </div>

                        <ol class="relative mt-4 ml-10 border-gray-200 border-s">
                          @foreach ($roadmap->playlists as $playlist)
                            <li class="mb-10 ms-6">
                              <span class="absolute flex items-center justify-center w-6 h-6 text-xs bg-gray-200 rounded-full -start-3 ring-2">
                                {{ $playlist->spl }}
                              </span>

                              <div class="flex items-center">
                                <span class="text-sm tracking-wide font-medium px-2.5 py-0.5 rounded-xl border border-gray-400 bg-green-200 text-green-800">
                                  Playlist {{ $playlist->name }}
                                </span>
                              </div>

                              <div class="block mt-6 mb-2 ml-6 text-base leading-none tracking-wide text-gray-700">
                                Roadmaps
                              </div>
                            </li>
                          @endforeach
                        </ol>
                      </li>
                    @endforeach
                  </ol>
                </li>
              @endforeach
            </ol>
          </div>
        </div>
      </section>
    </div>
  </div>
@endSection
