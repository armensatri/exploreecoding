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
              @foreach ($roles as $role)
                <li class="mb-10 ms-6">
                  <span class="absolute flex items-center justify-center w-6 h-6 text-xs bg-gray-200 rounded-full -start-3 ring-2">
                    {{ $role->sr }}
                  </span>

                  <div class="flex items-center">
                    <span class="{{ $role->bg }} {{ $role->text }} text-sm tracking-wide font-medium px-2.5 py-0.5 rounded-xl border border-gray-400">
                      {{ $role->name }}
                    </span>
                  </div>

                  <div class="block mt-6 mb-2 text-sm font-semibold leading-none tracking-wide text-black uppercase">
                    access menu
                  </div>

                  <div class="gap-2">
                    @foreach ($role->menus as $menu)
                      <div class="py-1">
                        <span class="ml-4 mr-2 text-base tracking-wide text-green-700">
                          {{ $menu->name }}
                        </span>

                        <span class="tracking-wide text-gray-400">
                          {{ $menu->description }}
                        </span>
                      </div>
                    @endforeach
                  </div>

                  <a href="{{ route('a.menu', [
                    'id' => $role->id,
                    'name' => $role->name])}}"
                    class="inline-flex items-center px-3 py-1 mt-4 text-sm font-medium text-gray-900 bg-blue-200 border border-gray-400 rounded-[10px] hover:bg-blue-600 hover:text-white">
                    <i class="mr-2 text-base bi bi-pencil-square"></i>
                    access menu
                  </a>
                </li>
              @endforeach
            </ol>
          </div>
        </div>
      </section>
    </div>
  </div>
@endSection
