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
            <ol class="relative border-red-100 border-s">
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
                      <a href="{{ route('paths.edit', $path->url) }}"
                        class="inline-flex items-center px-1.5 py-[3px] text-sm font-medium text-gray-900 bg-blue-200 border border-gray-400 rounded-lg hover:bg-blue-600 hover:text-white">
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

                  <div class="block mt-6 mb-2 ml-5 text-lg leading-none tracking-wide text-slate-700">
                    Roadmaps
                  </div>

                  <ol class="relative mt-4 ml-16 border-yellow-100 border-s">
                    @foreach ($path->roadmaps as $roadmap)
                      <li class="mb-10 ms-6">
                        <span class="absolute flex items-center justify-center w-6 h-6 text-xs bg-gray-200 rounded-full -start-3 ring-2">
                          {{ $roadmap->sr }}
                        </span>

                        <div>
                          <a href="{{ route('roadmaps.edit', $roadmap->url) }}">
                            <span class="absolute flex items-center justify-center px-1.5 py-[3px] -ml-10 text-xs border border-gray-400 bg-blue-200 hover:bg-blue-600 hover:text-white text-gray-900 rounded-lg -start-1.5">
                            <i class="text-xs bi bi-pencil-square"></i>
                            </span>
                          </a>
                        </div>

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

                        <div class="block mt-6 mb-2 ml-5 text-lg leading-none tracking-wide text-slate-700">
                          Playlists
                        </div>

                        <ol class="relative mt-4 ml-16 border-green-100 border-s">
                          @foreach ($roadmap->playlists as $playlist)
                            <li class="mb-10 ms-6">
                              <span class="absolute flex items-center justify-center w-6 h-6 text-xs bg-gray-200 rounded-full -start-3 ring-2">
                                {{ $playlist->spl }}
                              </span>

                              <div>
                                <a href="{{ route('playlists.edit', $playlist->url) }}">
                                  <span class="absolute flex items-center justify-center px-1.5 py-[3px] -ml-10 text-xs border border-gray-400 bg-blue-200 hover:bg-blue-600 hover:text-white text-gray-900 rounded-lg -start-1.5">
                                  <i class="text-xs bi bi-pencil-square"></i>
                                  </span>
                                </a>
                              </div>

                              <div class="flex items-center gap-2">
                                <span class="text-sm tracking-wide font-medium px-2.5 py-0.5 rounded-xl border border-green-400 bg-green-200 text-green-800">
                                  Playlist {{ $playlist->name }}
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
                                    {{ $playlist->status->bg }}
                                    {{ $playlist->status->text }}">
                                    {{ $playlist->status->name }}
                                  </span>
                                </div>

                                <div>
                                  <span class="text-sm text-gray-700">
                                    {{ $playlist->status->description }}
                                  </span>
                                </div>
                              </div>

                              <div class="block mt-6 mb-2 ml-5 text-lg leading-none tracking-wide text-slate-700">
                                Postingan
                              </div>

                              <ol class="relative mt-4 ml-16 border-slate-100 border-s">
                                @foreach ($playlist->posts as $post)
                                  <li class="mb-10 ms-6">
                                    <span class="absolute flex items-center justify-center w-6 h-6 text-xs bg-gray-200 rounded-full -start-3 ring-2">
                                      {{ $post->sp }}
                                    </span>

                                    <div>
                                      <a href="{{ route('posts.edit', $post->url) }}">
                                        <span class="absolute flex items-center justify-center px-1.5 py-[3px] -ml-10 text-xs border border-gray-400 bg-blue-200 hover:bg-blue-600 hover:text-white text-gray-900 rounded-lg -start-1.5">
                                        <i class="text-xs bi bi-pencil-square"></i>
                                        </span>
                                      </a>
                                    </div>

                                    <div class="flex items-center ml-1">
                                      <span class="text-base font-normal tracking-wide text-gray-700">
                                        {{ $post->title }}
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
                                          {{ $post->status->bg }}
                                          {{ $post->status->text }}">
                                          {{ $post->status->name }}
                                        </span>
                                      </div>

                                      <div>
                                        <span class="text-sm text-gray-700">
                                          {{ $post->status->description }}
                                        </span>
                                      </div>
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
