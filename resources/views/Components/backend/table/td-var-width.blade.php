<div class="flex items-center px-6 py-3 gap-x-3">
  <div class="hs-tooltip [--placement:auto]">
    <div class="relative hs-tooltip-toggle w-30 text-[15px] text-gray-600 truncate cursor-pointer">
      {{ $var }}
      <span class="absolute z-10 invisible px-2 py-px text-sm tracking-wide text-black bg-blue-200 border border-blue-300 rounded-lg hs-tooltip-content hs-tooltip-shown:visible max-w-max">
        {{ $tooltip }}
      </span>
    </div>
  </div>
</div>
