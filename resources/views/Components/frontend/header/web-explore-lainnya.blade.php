<div class="flex justify-center px-3 py-3 mb-8 rounded-2xl gap-x-3 hover:bg-linear-to-r hover:from-red-200 hover:to-green-200">

  <img src="{{ $image }}"
    alt="exp"
    class="size-5"
  />

  <div class="grow">
    <div class="inline-flex items-center mb-1 text-sm font-semibold tracking-wide text-gray-900 uppercase">
      {{ $menu }}
    </div>

    <div class="text-[15px] mt-1 lg:line-clamp-2 xl:line-clamp-none
      font-medium text-gray-600">
      {{ $description }}
    </div>

    <div class="inline-flex items-center px-2 py-1 mt-2
      text-xs font-medium border border-gray-500 hover:border-gray-600 rounded-[9px] leading-1 drop-shadow-sm tracking-wider
      {{ $route
          ? 'bg-blue-200 text-black hover:bg-blue-700
          hover:text-white hover:drop-shadow-lg'
          : 'bg-red-200 text-black hover:bg-red-700
          hover:text-white pointer-events-none'
      }}">
      <a href="{{ $route ?? '' }}" target="_blank">
        {{ $buttonName }}
        @if ($route)
          <i class="ml-1 text-xs bi bi-box-arrow-up-right"></i>
        @else
          <i class="ml-1 text-xs bi bi-x-circle"></i>
        @endif
      </a>
    </div>
  </div>
</div>
