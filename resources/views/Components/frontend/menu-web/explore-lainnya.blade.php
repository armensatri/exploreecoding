<a href="{{ $route }}"
  class="flex px-5 py-3 rounded-2xl gap-x-4 hover:bg-gradient-to-r hover:from-red-200 hover:to-green-200">

  <img src="{{ $image }}"
    alt="fe-menu"
    class="size-5"
  />

  <div class="grow">
    <div class="inline-flex items-center text-base font-bold text-gray-800 dark:text-neutral-200">
      {{ $menu }}
    </div>

    <div class="text-[15px] font-medium text-gray-600 dark:text-neutral-500 tracking-tight">
      {{ $description }}
    </div>

    <div class="inline-flex items-center px-2 mt-2 text-sm font-medium border border-gray-400 rounded-lg leading-1
    {{ $bg }} {{ $text }}">
      {{ $status }}
    </div>
  </div>
</a>
