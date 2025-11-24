<div class="flex items-center px-6 py-3 gap-x-3">
  <div class="hs-tooltip [--placement:auto]">
    <div class="relative hs-tooltip-toggle w-[120px] text-[15px] text-gray-600 truncate cursor-pointer">
      {{ $var }}
      <span class="hs-tooltip-content absolute z-10 invisible
        hs-tooltip-shown:visible max-w-max bg-blue-200 text-slate-900
        text-sm tracking-wide px-2 py-0.5 rounded-lg border
        border-blue-300">
        {{ $tooltip }}
      </span>
    </div>
  </div>
</div>
