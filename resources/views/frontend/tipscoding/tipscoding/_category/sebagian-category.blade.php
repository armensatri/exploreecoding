<div
  class="flex-wrap items-center justify-center hidden gap-3 lg:mb-5 lg:flex">
  @foreach ($categories->take(15) as $categori)
    <div>
      <a href="{{ route('ec-tipscoding.category', $categori->url) }}">
        <button
          class="flex items-center cursor-pointer pl-3 pr-1.5 py-1.5 rounded-[10px] border text-[15px] font-medium text-blue-600 border-blue-400 bg-gray-100 tracking-wide hover:text-black hover:bg-gray-200">

          <span class="mr-1 text-[8px] text-black">
            {{ $categori->sc }}
          </span>

          @if ($categori->image)
            <img src="{{ asset($categori->image) }}"
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
            {{ $categori->name }}
          </span>

          <span
            class="px-1.5 py-0.5 text-black bg-gray-100 rounded-md text-[11px] ml-1 border border-gray-400 tracking-wider">
            {{ $categori->tipscodings_count }} Tips
          </span>
        </button>
      </a>
    </div>
  @endforeach
</div>

<div class="justify-center hidden lg:flex">
  <a href="{{ route('ec-categori.index') }}">
    <button
      class="px-5 py-2 text-base font-semibold tracking-wide text-black bg-blue-300 border border-gray-400 shadow-sm cursor-pointer rounded-[14px] hover:bg-blue-600 hover:text-white">
      Semua category
    </button>
  </a>
</div>
