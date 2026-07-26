<div class="lg:col-span-8">
  <!-- card -->
  <div class="flex items-center justify-center">
    <div
      class="w-full max-w-5xl p-4 border border-gray-100 shadow-sm sm:p-6 rounded-2xl">
      <div
        class="grid items-center grid-cols-1 gap-6 md:grid-cols-12 lg:gap-8">
        <!-- card image -->
        <div class="relative md:col-span-6">
          <div class="relative z-10 overflow-hidden shadow-xs rounded-xl">
            <img
              src="{{ $tipscoding->image ?
                asset('storage/' . $tipscoding->image) :
                asset('image/default-content.jpg')
              }}"
              alt="Prospek Karier Android Developer"
              class="object-cover object-center w-full xl:h-60 h-62 sm:h-80 md:h-57.5 lg:h-52"
            />
          </div>
        </div>
        <!-- card image -->

        <!-- card title -->
        <div
          class="flex flex-col justify-between py-2 space-y-1 md:col-span-6">
          <div class="flex justify-between items-center">
            <a href="{{ route(
              'ec-tipscodings.category', $category->slug) }}">
              <span
                class="inline-block border border-gray-400 text-gray-600 text-[13px] font-medium px-2.5 py-0.5 rounded mb-4 underline underline-offset-2 decoration-blue-500 hover:bg-blue-300 hover:no-underline hover:text-black">
                🔹{{ $tipscoding->category->name }}
              </span>
            </a>

            <div
              class="inline-flex items-center text-gray-600 text-xs font-medium px-2.5 py-1 rounded mb-4">
              <i class="bi bi-eye mr-1 text-sm"></i>
              {{ \App\Helpers\FormatNumber::short($tipscoding->tipscodingviews_count) }}
            </div>
          </div>

          <h1
            class="mb-3 text-xl font-bold leading-snug text-gray-800 sm:text-2xl md:text-xl xl:text-[22px]">
            {{ $tipscoding->title }}
          </h1>

          <div
            class="mt-2 inline-flex items-center space-x-2 text-sm text-gray-500">
            <div
              class="flex items-center justify-center">
              <img
                src="{{ $tipscoding->user->image ?
                  asset('storage/' . $tipscoding->user->image) :
                  asset('image/user.png')
                }}"
                alt="author"
                class="object-cover w-9 h-9 border border-gray-500 rounded-full object-top p-px"
              />
            </div>

            <div
              class="inline-flex items-center space-x-2">
              <span
                class="font-medium text-blue-500 text-base">
                <span>@</span>{{ $tipscoding->user->username }}
              </span>

              <span class="text-gray-300">|</span>

              <span class="text-gray-600 text-[13px] mt-px">
                {{ $tipscoding->created_at->locale('id')
                  ->translatedFormat('d-m-y')
                }}
              </span>
            </div>
          </div>
        </div>
        <!-- card title -->
      </div>
    </div>
  </div>
  <!-- card -->

  <div class="mt-10 px-5">
    <article
      class="text-gray-800 prose
      prose-slate lg:prose-lg
      prose-h2:text-green-600
      prose-h2:font-bold
      prose-h3:text-green-600
      prose-h3:font-semibold
      prose-h4:text-gray-900
      prose-a:text-blue-600
        prose-pre:max-h-112.5
        prose-pre:overflow-y-auto
        prose-pre:overflow-x-auto
        prose-pre:rounded-2xl
        prose-pre:leading-10
        prose-code:leading-10">
      <x-markdown>
        {!! $tipscoding->content !!}
      </x-markdown>
    </article>
  </div>
</div>
