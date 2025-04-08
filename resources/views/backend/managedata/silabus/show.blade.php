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

                  <div class="flex items-center mt-3 ml-1">
                    <div>
                      <span class="mr-1.5 text-sm text-gray-700">
                        Action :
                      </span>
                      <a href=""
                        class="inline-flex items-center px-1.5 py-0.5 text-sm font-medium text-gray-900 bg-blue-200 border border-gray-400 rounded-lg hover:bg-blue-600 hover:text-white">
                        <i class="text-xs bi bi-pencil-square"></i>
                      </a>
                    </div>
                  </div>

                  <div class="flex items-center gap-2 mt-2 ml-1">
                    <div>
                      <span class="text-sm text-gray-700">
                        Status :
                      </span>
                    </div>

                    <div>
                      <span class="text-xs tracking-wide font-medium
                        rounded-lg px-2 py-0.5 border border-gray-400
                        {{ $path->status->bg }}
                        {{ $path->status->text }}">
                        {{ $path->status->name }}
                      </span>
                    </div>

                    <div>
                      <span class="text-sm text-gray-700">
                        {{ $path->status->description }}
                      </span>
                    </div>
                  </div>

                  <div class="flex items-center max-w-md mt-2 ml-1">
                    <div>
                      <span class="mr-1.5 text-sm text-gray-700">
                        Description :
                      </span>

                      <span class="text-sm text-gray-700">
                        {{ $path->description }}
                      </span>
                    </div>
                  </div>

                  <div class="block mt-6 mb-2 ml-6 text-base leading-none tracking-wide text-gray-700">
                    Roadmaps
                  </div>

                  <ol class="relative mt-4 border-gray-200 ml-14 border-s">
                    @foreach ($path->roadmaps as $roadmap)
                      <li class="mb-10 ms-6">
                        <span class="absolute flex items-center justify-center w-6 h-6 text-xs bg-gray-200 rounded-full -start-3 ring-2">
                          {{ $roadmap->sr }}
                        </span>

                        <span class="absolute flex items-center justify-center w-6 h-6 -ml-10 text-xs bg-gray-200 rounded-full -start-3 ring-2">
                          ahaha
                        </span>

                        <div class="flex items-center gap-2">
                          <span class="text-sm tracking-wide font-medium px-2.5 py-0.5 rounded-xl border border-gray-400 bg-yellow-200 text-yellow-800">
                            Roadmap {{ $roadmap->name }}
                          </span>
                        </div>

                        <div class="flex items-center gap-2 mt-1 ml-1">
                          <div>
                            <span class="text-sm text-gray-700">
                              Status :
                            </span>
                          </div>

                          <div>
                            <span class="text-xs tracking-wide font-medium
                              rounded-lg px-2 py-0.5 border border-gray-400
                              {{ $roadmap->status->bg }}
                              {{ $roadmap->status->text }}">
                              {{ $roadmap->status->name }}
                            </span>
                          </div>

                          <div>
                            <span class="text-sm text-gray-700">
                              {{ $roadmap->status->description }}
                            </span>
                          </div>
                        </div>

                        <div class="block mt-6 mb-2 ml-6 text-base leading-none tracking-wide text-gray-700">
                          Playlists
                        </div>

                        <ol class="relative mt-4 border-gray-200 ml-14 border-s">
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

                              <div class="flex items-center mt-3 ml-1">
                                <div>
                                  <span class="mr-1.5 text-sm text-gray-700">
                                    Action
                                  </span>
                                  <a href=""
                                    class="inline-flex items-center px-1.5 py-0.5 text-sm font-medium text-gray-900 bg-blue-200 border border-gray-400 rounded-lg hover:bg-blue-600 hover:text-white">
                                    <i class="text-xs bi bi-pencil-square"></i>
                                  </a>
                                </div>
                              </div>

                              <div class="flex items-center mt-2 ml-1">
                                <div>
                                  <span class="mr-1.5 text-sm text-gray-700">
                                    Status
                                  </span>

                                  <span class="text-xs tracking-wide font-medium
                                    rounded-full mr-2 px-2 py-0.5 border border-gray-400
                                    {{ $playlist->status->bg }}
                                    {{ $playlist->status->text }}">
                                    {{ $playlist->status->name }}
                                  </span>

                                  <span class="text-sm text-gray-700">
                                    {{ $playlist->status->description }}
                                  </span>
                                </div>
                              </div>

                              <div class="block mt-6 mb-2 ml-6 text-base font-medium leading-none tracking-normal text-gray-700">
                                Posts
                              </div>

                              <ol class="relative mt-4 ml-12 border-gray-200 border-s">
                                @foreach ($playlist->posts as $post)
                                  <li class="mb-5 ms-6">
                                    <span class="absolute flex items-center justify-center w-6 h-6 text-xs bg-gray-200 rounded-full -start-3 ring-2">
                                      {{ $post->sp }}
                                    </span>

                                    <div class="flex items-center">
                                      <span class="text-base tracking-wide">
                                        {{ $post->title }}
                                      </span>
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
                </li>
              @endforeach
            </ol>
          </div>
        </div>
      </section>
    </div>
  </div>
@endSection
