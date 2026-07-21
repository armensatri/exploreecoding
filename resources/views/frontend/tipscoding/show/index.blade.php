@extends('frontend.template.main')

@section('content-frontend')
  <div class="relative px-6 bg-sky-100 pt-14 lg:px-8">
    <div class="mt-16">
      <div class="mx-auto max-w-7xl">
        @include('frontend.xbreadcrumb.show.index')
      </div>
    </div>

    <div class="max-w-2xl mx-auto mt-32 xl:max-w-4xl">
      <div class="text-center">
        <div class="mx-auto text-center">
          <h2
            class="text-2xl font-bold tracking-normal text-gray-800 uppercase sm:text-3xl">
            <span
              class="text-transparent bg-linear-to-r from-green-500 to-emerald-300 bg-clip-text">
              Tips coding
            </span>
          </h2>
        </div>

        <p class="mx-auto mt-4 text-xl text-center text-gray-700">
          show
          <span class="text-blue-600">
            tips
          </span>
          exploreecoding berisi tips coding praktis panduan sederhana dan wawasan pengembangan pengetahuan
        </p>
      </div>
    </div>

    <div class="">
      <div class="gap-x-20">
        <section class="px-4 py-10 mx-auto max-w-7xl">
          <div class="py-5 text-center">
            <div class="mx-auto text-center">
              <h3 class="text-lg font-bold text-gray-900 uppercase">
                Tips
                <span class="text-blue-500">
                  categori
                </span>
              </h3>
            </div>
          </div>

          {{-- index semua tips --}}
          <div class="flex justify-center mb-10">
            <a href="{{ route('ec-tipscodings.index') }}">
              <button
                class="flex items-center cursor-pointer pl-3 pr-1.5 py-1.5 rounded-[10px] border text-[15px] font-medium text-blue-600 border-blue-400 bg-gray-100 tracking-wide hover:text-black hover:bg-gray-200 whitespace-nowrap">
                🔹
                <img src="{{ asset(
                  'frontend/img/navigation/tipscodings.png') }}"
                  alt="image"
                  class="object-contain w-4 h-4 mr-2"
                />

                <span
                  class="mr-1 text-green-600 underline underline-offset-2 decoration-green-500">
                  Index semua tips
                </span>

                <span
                  class="px-1.5 py-0.5 text-green-700 bg-gray-100 rounded-md text-[11px] ml-1 border border-gray-400 tracking-wider">
                  {{ $tipstotal }} Tips
                </span>
              </button>
            </a>
          </div>
          {{-- index semua tips --}}

          {{-- sebagian category --}}
          <div
            class="flex-wrap items-center justify-center hidden gap-3 lg:mb-5 lg:flex">
            @foreach ($categories as $category)
              <div>
                <a href="{{ route('ec-tipscodings.category', $category->slug) }}">
                  <button
                    class="flex items-center cursor-pointer pl-3 pr-1.5 py-1.5 rounded-[10px] border text-[15px] font-medium text-blue-600 border-blue-400 bg-gray-100 tracking-wide hover:text-black hover:bg-gray-200">
                    🔹
                    <span class="mr-1 text-[11px] text-black">
                      {{ $category->sc }}
                    </span>

                    @if ($category->image)
                      <img src="{{ asset($category->image) }}"
                        alt="category"
                        class="w-4.5 h-4.5 mr-1"
                      />
                    @else
                      <img src="{{ asset('image/default.png') }}"
                        alt="default"
                        class="w-5.5 h-5.5 mr-1"
                      />
                    @endif

                    <span
                      class="mr-1 hover:underline hover:underline-offset-2 hover:decoration-blue-500">
                      {{ $category->name }}
                    </span>

                    <span
                      class="px-1.5 py-0.5 text-black bg-gray-100 rounded-md text-[11px] ml-1 border border-gray-400 tracking-wider">
                      {{ $category->tipscodings_count }} Tips
                    </span>
                  </button>
                </a>
              </div>
            @endforeach
          </div>

          <div class="justify-center hidden lg:flex">
            <a href="{{ route('ec-categories.index') }}">
              <button
                class="px-5 py-2 text-base font-semibold tracking-wide text-black bg-blue-200 border border-gray-400 shadow-sm cursor-pointer rounded-[14px] hover:bg-blue-600 hover:text-white">
                🔹Semua category
              </button>
            </a>
          </div>
          {{-- sebagian category --}}

          {{-- select category --}}
          <div class="flex items-center justify-center mb-5 lg:mb-0">
            <div class="lg:hidden">
              <button type="button"
                id="dropdownDefaultButton"
                data-dropdown-toggle="dropdown"
                class="inline-flex items-center justify-center bg-blue-200
                px-3 py-1.5 rounded-xl border border-gray-400 text-black
                font-medium text-base tracking-wide cursor-pointer hover:bg-blue-300">
                Select category
                <svg xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  viewBox="0 0 16 16"
                  class="ml-1.5 text-black bi bi-arrow-down-circle">
                  <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"
                  />
                </svg>
              </button>

              <div id="dropdown"
                class="z-10 hidden overflow-hidden bg-gray-100 border border-gray-400 shadow-lg w-max rounded-[20px]">
                <div class="max-h-87.5 overflow-y-auto p-4">
                  <ul class="space-y-4 text-sm font-medium text-body">
                    @foreach ($categories as $category)
                      <li>
                        <div class="flex items-center justify-center">
                          <a href="{{ route('ec-tipscodings.category', $category->slug) }}">
                            <button
                              class="flex items-center cursor-pointer pl-3 pr-1.5 py-1.5 rounded-[10px] border text-[15px] font-medium text-blue-600 border-blue-400 bg-gray-100 tracking-wide hover:text-black hover:bg-gray-200 whitespace-nowrap">
                              🔹
                              <span class="text-[11px] mr-1 text-black">
                                {{ $category->sc }}
                              </span>

                              @if ($category->image)
                                <img src="{{ asset($category->image) }}"
                                  alt="category"
                                  class="w-4.5 h-4.5 mr-1"
                                />
                              @else
                                <img src="{{ asset('image/default.png') }}"
                                  alt="default"
                                  class="w-5.5 h-5.5 mr-1"
                                />
                              @endif

                              <span
                                class="mr-1 hover:underline hover:underline-offset-2 hover:decoration-blue-500">
                                {{ $category->name }}
                              </span>

                              <span
                                class="px-1.5 py-0.5 text-black bg-gray-100 rounded-md text-[11px] ml-1 border border-gray-400 tracking-wider">
                                {{ $category->tipscodings_count }} Tips
                              </span>
                            </button>
                          </a>
                        </div>
                      </li>
                    @endforeach
                  </ul>

                  <div class="w-full p-2">
                    <a href="{{ route('ec-categories.index') }}"
                      class="block w-full">
                      <button
                        class="cursor-pointer w-full py-2 mb-1 mt-6 text-base font-semibold tracking-wide text-center text-black bg-blue-200 border border-gray-400 shadow-sm rounded-[14px] hover:bg-blue-600 hover:text-white">
                        🔹Semua category
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- select category --}}

          {{-- card detail --}}
          <div class="py-10 mx-auto max-w-7xl">
            <div class="mx-auto">
              <div
                class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6">
                <div class="lg:col-span-2">
                  <div class="py-8 lg:pe-8">
                    <div class="space-y-5 lg:space-y-8">
                      <a href=""
                        class="inline-flex items-center gap-x-1.5 text-sm text-muted-foreground-2 decoration-2 hover:underline focus:outline-hidden focus:underline"/>
                        Back to Blog
                      </a>

                      <div
                        class="relative h-full p-8 overflow-hidden border rounded-2xl">
                        <h1 class="text-3xl font-bold text-gray-900">
                          {{ $tipscoding->title }}
                        </h1>

                        <p class="mt-2 text-sm text-gray-500">
                          5 episodes, last updated on 20 November 2024
                        </p>

                        <p class="max-w-xl mt-4 text-gray-600">
                          {{ $tipscoding->excerpt }}
                        </p>

                        <div class="flex flex-wrap gap-3 mt-8">
                          <button
                            class="flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                            ▶ Mulai Belajar
                          </button>

                          <button
                            class="flex items-center gap-2 px-5 py-2.5 text-sm text-gray-700 border rounded-lg hover:bg-gray-50">
                            ⏱ Tonton Nanti
                          </button>

                          <button
                            class="flex items-center gap-2 px-5 py-2.5 text-sm text-gray-700 border rounded-lg hover:bg-gray-50">
                            📄 Source code
                          </button>

                          <button
                            class="flex items-center gap-2 px-5 py-2.5 text-sm text-gray-700 border rounded-lg hover:bg-gray-50">
                            🔗 Bagikan
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="p-6">
                    <p
                      class="text-lg text-foreground">At preline, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also helps them grow.
                    </p>
                  </div>
                </div>

                <div
                  class="lg:col-span-1 lg:w-full lg:h-full lg:bg-linear-to-r lg:from-background lg:via-transparent lg:to-transparent">
                  <div class="sticky top-0 py-8 inset-s-0 lg:ps-8">
                    <div
                      class="flex items-center pb-8 mb-8 border-b group gap-x-3 border-line-2">
                      <a href="#"
                        class="block shrink-0 focus:outline-hidden"/>
                        <img
                          src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                          alt="Avatar"
                          class="rounded-full size-10"
                        />
                      </a>

                      <a href=""
                        class="block group grow focus:outline-hidden">
                        <h5
                          class="text-sm font-semibold group-hover:text-muted-foreground-2 group-focus:text-muted-foreground-2 text-foreground">
                          Leyla Ludic
                        </h5>

                        <p class="text-sm text-muted-foreground-1">
                          UI/UX enthusiast
                        </p>
                      </a>

                      <div class="grow">
                        <div class="flex justify-end">
                          <button
                            type="button"
                            class="py-1.5 px-2.5 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="shrink-0 size-4"
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round">
                              <path
                                d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"
                              />
                              <circle cx="9" cy="7" r="4"/>
                              <line x1="19" y1="8" x2="19" y2="14"/>
                              <line x1="22" y1="11" x2="16" y2="11"/>
                            </svg>
                            Follow
                          </button>
                        </div>
                      </div>
                    </div>

                    <div class="space-y-6">
                      <a href="#"
                        class="flex items-center group gap-x-6 focus:outline-hidden">
                        <div class="grow">
                          <span
                            class="text-sm font-bold text-foreground group-hover:text-primary-hover group-focus:text-primary-focus">
                            5 Reasons to Not start a UX Designer Career in 2022/2023
                          </span>
                        </div>

                        <div
                          class="relative overflow-hidden rounded-lg shrink-0 size-20">
                          <img
                            src="https://images.unsplash.com/photo-1567016526105-22da7c13161a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80"
                            alt="Blog Image"
                            class="absolute top-0 object-cover rounded-lg size-full inset-s-0"
                          />
                        </div>
                      </a>

                      <a href="#"
                        class="flex items-center group gap-x-6 focus:outline-hidden">
                        <div class="grow">
                          <span
                            class="text-sm font-bold text-foreground group-hover:text-primary-hover group-focus:text-primary-focus">
                            If your UX Portfolio has this 20% Well Done, it Will Give You an 80% Result
                          </span>
                        </div>

                        <div
                          class="relative overflow-hidden rounded-lg shrink-0 size-20">
                          <img
                            src="https://images.unsplash.com/photo-1542125387-c71274d94f0a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80"
                            alt="Blog Image"
                            class="absolute top-0 object-cover rounded-lg size-full inset-s-0"
                          />
                        </div>
                      </a>

                      <a href="#"
                        class="flex items-center group gap-x-6 focus:outline-hidden">
                        <div class="grow">
                          <span
                            class="text-sm font-bold text-foreground group-hover:text-primary-hover group-focus:text-primary-focus">
                            7 Principles of Icon Design
                          </span>
                        </div>

                        <div
                          class="relative overflow-hidden rounded-lg shrink-0 size-20">
                          <img
                            src="https://images.unsplash.com/photo-1586232702178-f044c5f4d4b7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80"
                            alt="Blog Image"
                            class="absolute top-0 object-cover rounded-lg size-full inset-s-0"
                          />
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          {{-- card detail --}}
        </section>
      </div>
    </div>
  </div>
@endsection
