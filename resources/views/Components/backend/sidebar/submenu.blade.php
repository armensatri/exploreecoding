<a href="{{ $route }}"
  class="{{ Request::is($active) ? $active : '' }}
  inline-flex w-full items-center p-2 hover:bg-linear-to-r hover:via-red-50 hover:from-gray-50 hover:to-green-50 hover:rounded-full">

  <span class="text-xs text-blue-700">
    @if (Auth::user()?->role?->submenus?->contains('name', $subMenu))
      <i class="bi bi-check2 text-[10px] text-green-600"></i>
    @else
      <i class="bi bi-x text-[11px] text-red-600"></i>
    @endif
  </span>

  <img src="{{ $image }}"
    alt="icon"
    class="w-4 h-4 ml-2 mr-2"
  />

  <div>
    <span class="text-[10px] text-black">
      {{ $ssm }}
    </span>
    <span class="text-[16px] font-normal tracking-wide text-blue-600">
      {{ $subMenu }}
    </span>
  </div>

  <span class="ml-2">
    @if(Request::is($active))
      <svg xmlns="http://www.w3.org/2000/svg"
        width="14"
        height="14"
        fill="currentColor"
        viewBox="0 0 16 16"
        class="text-green-700 bi bi-check2-circle">
        <path d="M2.5 8a5.5 5.5 0 0 1
          8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5
          8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"
        />

        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8
          9.293 5.354 6.646a.5.5 0 1 0-.708.708l3
          3a.5.5 0 0 0 .708 0z"
        />
      </svg>
    @endif
  </span>
</a>
