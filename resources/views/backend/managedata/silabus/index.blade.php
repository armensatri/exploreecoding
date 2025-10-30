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
                <div class="border border-gray-200 bg-white rounded-2xl
                  py-4 px-4 mb-4 w-full">
                  <div class="grow">
                    <div class="inline-flex items-center">
                      <div class="text-white mr-2">
                        <div class="rounded-[7px] border border-gray-500
                          px-1.5 py-0.5 font-medium text-xs bg-slate-400">
                          {{ $path->sp }}
                        </div>
                      </div>

                      <div class="text-gray-600 font-medium mr-2">
                        Path
                      </div>

                      <div class="text-gray-600 tracking-wide font-medium">
                        {{ $path->name }}
                      </div>

                      <div class="ml-2">
                        <div class="flex items-center gap-1.5">
                          <span class="
                            {{ $path->status->text }}
                            {{ $path->status->bg }}
                            text-xs rounded-md px-1 border border-gray-300">
                            {{ $path->status->name }}
                          </span>
                        </div>
                      </div>
                    </div>

                    <p class="ml-1 mt-3 text-[15px] text-gray-600 dark:text-neutral-400 max-w-xl line-clamp-2 md:line-clamp-none">
                      {{ $path->description }}
                    </p>

                    <div class="gap-2 mt-3">
                      <div class="flex items-center gap-2">
                        <div>
                          <span class="py-1 pl-2 pr-1 inline-flex
                            items-center gap-x-1 text-sm font-medium border border-gray-400 bg-gray-200 text-slate-700 rounded-lg tracking-wide">
                            Roadmaps .
                            {{ $path->roadmaps->count() }}
                            <span class="ml-2 rounded-[4px] bg-blue-700 text-xs text-white px-1.5 py-[2px] shadow">
                              <i class="bi bi-box-arrow-up-right"></i>
                              show
                            </span>
                          </span>
                        </div>
                      </div>
                    </div>
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
