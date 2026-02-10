<div
  class="flex-wrap items-center justify-center hidden gap-3 lg:mb-20 lg:flex">

  @foreach ($categories->take(15) as $category)
    <div>
      <a href="{{ route('ec-tipscoding.category', $category->url) }}">
        <button
          class="flex items-center cursor-pointer pl-3 pr-1.5 py-1.5 rounded-[10px] border text-[15px] font-medium text-blue-600 border-blue-400 bg-gray-100 tracking-wide hover:text-black hover:bg-gray-200">

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
  @endforeach
</div>
