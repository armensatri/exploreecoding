<aside class="lg:col-span-4">
  <div class="sticky space-y-8 top-24">
    <div>
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
              src="/image/default-content.jpg"
              class="object-cover w-24 h-16 rounded-xl"
            />

            <div class="my-auto">
              <p class="mb-1 text-sm text-gray-600">
                <span class="text-blue-600">
                  <span>@</span>{{ $related->user->username }}
                </span> -
                <span class="text-xs">
                  180526
                </span>
              </p>

              <a href="">
                <h4
                  class="ml-px text-base font-medium tracking-wide text-gray-700 hover:text-blue-600 hover:underline hover:decoration-1 hover:decoration-blue-600">
                  {{ $related->title }}
                </h4>
              </a>
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
        <div class="relative flex flex-col items-center group">
          <a href=""
            class="mx-1.5 rounded-full ring-1 ring-slate-500 ring-offset-2">
            <img src="{{ asset('image/default-content.jpg') }}"
              alt="youtube"
              loading="lazy"
              class="w-8 h-8 rounded-full drop-shadow-sm"
            />
          </a>

          <!-- Tooltip -->
          <div
            class="absolute hidden px-3 py-1 mb-2 text-xs text-white rounded-md shadow-lg bottom-full group-hover:block bg-slate-800 whitespace-nowrap">
            YouTube
          </div>

          <span class="flex items-center mt-2 text-xs gap-x-1 text-slate-600">
            <i class="text-2xs bi bi-share"></i> -
            100.rb
          </span>
        </div>
      </div>
    </div>
  </div>
</aside>
