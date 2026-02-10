<div class="flex items-center justify-center mb-20 lg:mb-0">
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
              class="z-10 hidden overflow-hidden bg-gray-100 border border-gray-400 shadow-lg w-max rounded-2xl">
              <div class="max-h-87.5 overflow-y-auto p-4">
                <ul class="space-y-4 text-sm font-medium text-body">
                  @foreach ($categories->take(15) as $category)
                    <li>
                      <div class="flex justify-center">
                        <a href="{{ route(
                          'ec-tipscoding.category', $category->url) }}">
                          <button
                            class="flex items-center cursor-pointer pl-3 pr-1.5 py-1.5 rounded-[10px] border text-[15px] font-medium text-blue-600 border-blue-400 bg-gray-100 tracking-wide hover:text-black hover:bg-gray-200 whitespace-nowrap">

                            <span class="mr-1 text-[8px] text-black">
                              {{ $category->sc }}
                            </span>

                             @if ($category->image)
                              <img
                                src="{{ asset($category->image) }}"
                                alt="category"
                                class="w-4.5 h-4.5 mr-1"
                              />
                            @else
                              <img
                                src="{{ asset('image/default.png') }}"
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
              </div>
            </div>
          </div>
        </div>
