<div class="lg:col-span-8">
  <div class="flex items-center justify-center">
    <div
      class="w-full max-w-5xl p-4 border border-gray-100 shadow-sm sm:p-6 rounded-2xl">
      <div
        class="grid items-center grid-cols-1 gap-6 md:grid-cols-12 lg:gap-8">
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

        <div
          class="flex flex-col justify-between py-2 space-y-1 md:col-span-6">
          <div class="flex items-center justify-between">
            <a href="{{ route(
              'ec-tipscodings.category', $category->slug) }}">
              <span
                class="inline-block border border-gray-400 text-gray-600 text-[13px] font-medium px-2.5 py-0.5 rounded mb-4 underline underline-offset-2 decoration-blue-500 hover:bg-blue-300 hover:no-underline hover:text-black">
                🔹{{ $tipscoding->category->name }}
              </span>
            </a>

            <div
              class="inline-flex items-center text-gray-600 text-xs font-medium px-2.5 py-1 rounded mb-4">
              <i class="mr-1 text-sm bi bi-eye"></i>
              {{ \App\Helpers\FormatNumber::short($tipscoding->tipscodingviews_count) }}
            </div>
          </div>

          <h1
            class="mb-3 text-xl font-bold leading-snug text-gray-800 sm:text-2xl md:text-xl xl:text-[22px]">
            {{ $tipscoding->title }}
          </h1>

          <div
            class="inline-flex items-center mt-2 space-x-2 text-sm text-gray-500">
            <div
              class="flex items-center justify-center">
              <img
                src="{{ $tipscoding->user->image ?
                  asset('storage/' . $tipscoding->user->image) :
                  asset('image/user.png')
                }}"
                alt="author"
                class="object-cover object-top w-10 h-10 p-px bg-gray-500 rounded-full"
              />
            </div>

            <div
              class="inline-flex items-center space-x-2">
              <span
                class="text-base font-medium text-blue-500">
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
      </div>
    </div>
  </div>

  <div class="px-5 mt-10">
    <article
      id="daftar-isi-tipscoding"
      class="prose text-gray-800 prose-slate lg:prose-lg prose-h2:text-green-600 prose-h2:font-bold prose-h3:text-green-600 prose-h3:font-medium prose-h4:text-gray-900 prose-a:text-blue-600 prose-pre:rounded-2xl prose-code:leading-10">
      <x-markdown>
        {!! $tipscoding->content !!}
      </x-markdown>
    </article>
  </div>
</div>
