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
          @include('backend.sbreadcrumb.silabus.index')
        </div>

        <div class="w-full p-14 bg-gray-50 border border-gray-200
  shadow-xs rounded-3xl">
          <div>
            @foreach ($paths as $path)
              <div class="group relative flex gap-x-5">
                <div class="border border-gray-200 bg-white rounded-2xl py-4 px-4 mb-4 w-full">
                  <div class="grow">
                    <div class="inline-flex items-center">
                      <div class="text-red-800 mr-2">
                        <div class="rounded-[7px] border border-gray-400
                        px-1.5 py-0.5 font-medium text-xs bg-red-200">
                          {{ $path->sp }}
                        </div>
                      </div>
                      <div class="text-gray-600 font-medium mr-2">
                        Path
                      </div>
                      <div class="text-gray-600 tracking-wide font-medium">
                        {{ $path->name }}
                      </div>
                      <div class=" text-gray-600 dark:text-neutral-400">
                        <i class="bi bi-dot text-6xl {{ $path->status->text }}"></i>
                        {{ $path->status->name }}
                      </div>
                    </div>

                    <p class="ml-1 mt-3 text-[15px] text-gray-600 dark:text-neutral-400 max-w-xl">
                      {{ $path->description }}
                    </p>

                    <ul class="list-none ms-6 mt-3 space-y-1.5">
                      @foreach ($path->roadmaps as $roadmap)
                        <li class="text-sm text-gray-600 dark:text-neutral-400">
                          <div class="flex items-center w-full font-mono">
                            <span class="whitespace-nowrap">
                              {{ $roadmap->name }}
                            </span>
                            <span
                              class="flex-1 border-b border-dotted border-gray-400 mx-2">
                            </span>
                            <span
                              class="text-xs text-gray-600 dark:text-neutral-400 {{ $roadmap->status->bg }} {{ $roadmap->status->text }} px-2 py-[2px] rounded-lg border border-gray-300">
                              {{ $roadmap->status->name }}
                            </span>
                          </div>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
