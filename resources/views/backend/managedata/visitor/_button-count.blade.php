<div class="flex flex-col md:flex-row items-center justify-center gap-4">
  <div class="pl-2 pr-1 py-1.25 text-sm text-green-900 bg-green-200
    font-serif rounded-[9px] border border-green-300 tracking-wide">
    User online

    <span class="px-2 py-0.75 text-xs text-black bg-white rounded-[7px]
      font-sans border border-blue-800">
      {{ $users->where('status_on_of', 1)->count() }}
    </span>
  </div>

  <div class="pl-2 pr-1 py-1.25 text-sm text-red-900 bg-red-200 font-serif
    rounded-[9px] border border-red-300 tracking-wide">
    User offline
    <span class="px-2 py-0.75 text-xs text-black bg-white rounded-[7px]
      font-sans border border-blue-800">
      {{ $users->where('status_on_of', 0)->count() }}
    </span>
  </div>

  <div class="pl-2 pr-1 py-1.25 text-sm text-green-900 bg-green-200
    font-serif rounded-[9px] border border-green-300 tracking-wide">
    User verify
    <span class="px-2 py-0.75 text-xs text-black bg-white rounded-[7px]
      font-sans border border-green-800">
      0
    </span>
  </div>

  <div class="pl-2 pr-1 py-1.25 text-sm text-red-900 bg-red-200 font-serif
    rounded-[9px] border border-red-300 tracking-wide">
    User not verify
    <span class="px-2 py-0.75 text-xs text-black bg-white rounded-[7px]
      font-sans border border-red-800">
      0
    </span>
  </div>
</div>
