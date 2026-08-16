<aside class="lg:col-span-4">
  <div class="sticky space-y-8 top-24">
    <div class="hidden lg:block">
      <h3 class="mb-4 text-[20px] font-semibold text-gray-800">
        Daftar isi content
      </h3>

      <div class="flex">
        <ul id="toc"></ul>
      </div>
    </div>

    <div>
      <h3 class="mb-4 text-[20px] font-semibold text-gray-800">
        Related tips content
      </h3>

      <div
        class="ml-2 space-y-5 grid grid-cols-1 md:grid-cols-2 gap-4 lg:grid-cols-1">
        @foreach ($relatedTips as $related)
          <div class="flex gap-3 group">
            <img
              src="{{ $related->image ?
                asset('storage/' . $related->image) :
                asset('image/default-content.jpg')
              }}"
              class="object-cover w-24 h-16 rounded-xl"
            />

            <div class="my-auto">
              <p class="mb-1 text-sm text-gray-600">
                <span class="text-blue-600">
                  <span>@</span>{{ $related->user->username }}
                </span> -

                <span class="text-xs">
                  {{ $related->created_at->locale('id')
                    ->translatedFormat('dmy')
                  }}
                </span>
              </p>

              <div class="relative inline-block">
                <a href="{{ route('ec-tipscodings.show', [
                    'category' => $related->category->slug,
                    'tipscoding' => $related->slug
                  ]) }}">
                  <div data-tooltip-target="tooltip-default-{{
                    $related->id }}"
                    class="ml-px text-base font-medium tracking-wide text-gray-700 cursor-pointer hover:text-blue-600 hover:underline hover:decoration-blue-600 line-clamp-1">
                    <span>
                      🔹
                      {{-- < sm --}}
                      <span class="sm:hidden">
                        {{ Str::words($related->title, 3) }}
                      </span>

                      {{-- sm --}}
                      <span class="hidden sm:inline md:hidden">
                        {{ Str::words($related->title, 4) }}
                      </span>

                      {{-- md --}}
                      <span class="hidden md:inline lg:hidden">
                        {{ Str::words($related->title, 2) }}
                      </span>

                      {{-- lg --}}
                      <span class="hidden lg:inline xl:hidden">
                        {{ Str::words($related->title, 4) }}
                      </span>

                      {{-- xl --}}
                      <span class="hidden xl:inline">
                        {{ Str::words($related->title, 3) }}
                      </span>
                    </span>
                  </div>
                </a>

                <div
                  id="tooltip-default-{{ $related->id }}" role="tooltip" class="absolute z-10 invisible px-2 py-px text-sm tracking-wide text-black bg-blue-300 border border-blue-400 rounded-lg hs-tooltip-content hs-tooltip-shown:visible max-w-max">
                  {{ $related->title }}
                  <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div>
      <h3 class="mb-4 text-[20px] font-semibold text-gray-800">
        Share on social media
      </h3>

      <div class="flex gap-3 ml-2">
        <x-tipscoding-show-share-on-sosmed
          link=""
          :image="asset('frontend/img/sosmed/linkedin.png')"
          alt="linkedin"
          tooltip="Share on linkedin"
          share-count="0"
        />

        <x-tipscoding-show-share-on-sosmed
          link=""
          :image="asset('frontend/img/sosmed/threads.png')"
          alt="threads"
          tooltip="Share on threads"
          share-count="0"
        />

        <x-tipscoding-show-share-on-sosmed
          link=""
          :image="asset('frontend/img/sosmed/facebook.png')"
          alt="facebook"
          tooltip="Share on facebook"
          share-count="0"
        />

        <x-tipscoding-show-share-on-sosmed
          link=""
          :image="asset('frontend/img/sosmed/x.png')"
          alt="X"
          tooltip="Share on X"
          share-count="0"
        />

        <x-tipscoding-show-share-on-sosmed
          link=""
          :image="asset('frontend/img/sosmed/telegram.png')"
          alt="telegram"
          tooltip="Share on telegram"
          share-count="0"
        />
      </div>
    </div>

    <div>
      <h3 class="mb-4 text-[20px] font-semibold text-gray-800">
        Related categories
      </h3>

      <div class="flex gap-3 ml-2">
        <div class="flex flex-wrap items-center gap-3">
          @foreach ($relatedcategories as $category)
            <div>
              <a href="{{ route('ec-tipscodings.category',
                $category->slug) }}">
                <button
                  class="flex items-center cursor-pointer pl-0.5 pr-1.5 py-1 rounded-[10px] border text-[15px] font-medium text-blue-600 border-blue-400 bg-gray-100 tracking-wide hover:text-black hover:bg-gray-200">
                  🔹
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
                </button>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</aside>
