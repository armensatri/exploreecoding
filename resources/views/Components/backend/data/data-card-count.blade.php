<div class="p-3 text-center border border-gray-300 rounded-3xl bg-slate-50">
  <div class="flex justify-end">
    <div id="dropdownHoverButton-{{ $hover }}"
      data-dropdown-toggle="dropdownHover-{{ $hover }}" data-dropdown-trigger="hover"
      class="inline-flex items-center px-1 text-base font-medium text-center hover:border hover:rounded-full hover:border-gray-400 hover:bg-gray-200 hover:cursor-pointer">
      <i class="bi bi-three-dots-vertical"></i>
    </div>

    <div id="dropdownHover-{{ $hover }}"
      class="z-10 hidden p-3 mt-2 space-y-2 border border-gray-400 divide-y divide-gray-100 shadow-sm w-28 bg-slate-100 dark:bg-gray-700 rounded-2xl">
      <span class="block mb-2.5 text-xs font-medium text-gray-600 uppercase tracking-wide">
        Action
      </span>

      <div class="flex items-center justify-center gap-2">
        <div>
          <a href="{{ $route }}"
            class="inline-flex items-center justify-center px-8 py-1.5 bg-green-700 rounded-xl hover:bg-green-800">
            <i class="text-base text-white bi bi-eye"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="flex items-center justify-center">
    <div class="flex items-center justify-center w-12 h-12 p-1 border border-gray-400 rounded-full">
      <img src="{{ $img }}"
        class="w-8 h-8 rounded-full"
        alt="{{ $alt }}"
      />
    </div>
  </div>

  <div class="mt-2 mb-1 text-lg font-semibold tracking-wide text-gray-800">
    {{ $dataName }}
  </div>

  <div class="mt-2 mb-2 text-base font-medium text-gray-600">
    {{ $dataCount }}
  </div>
</div>
