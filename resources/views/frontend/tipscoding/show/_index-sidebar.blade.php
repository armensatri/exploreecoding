<aside class="lg:col-span-4">
  <div class="sticky space-y-8 top-24">
    <div class="hidden lg:block">
      <h3 class="mb-4 text-[18px] font-semibold text-gray-800">
        Daftar isi content
      </h3>

      <div class="flex">
        <ul id="toc"></ul>
      </div>
    </div>

    <div>
      <h3 class="mb-4 text-[18px] font-semibold text-gray-800">
        Related tips content
      </h3>

      <div class="ml-2 space-y-5">
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
                  <h4
                    class="ml-px text-base font-medium tracking-wide text-gray-700 cursor-pointer hover:text-blue-600 hover:underline hover:decoration-blue-600 lg:line-clamp-1">
                    {{ $related->title }}
                  </h4>
                </a>

                <div
                  class="absolute left-0 z-50 hidden px-3 py-1 mt-2 text-sm tracking-wide text-white transition-all duration-200 -translate-y-1 bg-gray-900 rounded-lg shadow-lg opacity-0 pointer-events-none whitespace-nowrap lg:block group-hover:translate-y-0 group-hover:opacity-100">
                  {{ $related->title }}

                  <div
                    class="absolute w-3 h-3 rotate-45 bg-gray-900 -top-1 left-5">
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div>
      <h3 class="mb-4 text-[18px] font-semibold text-gray-800">
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
  </div>
</aside>
