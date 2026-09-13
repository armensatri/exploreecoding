<div class="hs-dropdown [--auto-close:inside] relative inline-flex">
  <button
    id="hs-dropdown-default"
    type="button"
    aria-haspopup="menu"
    aria-expanded="false"
    aria-label="Dropdown"
    class="hs-dropdown-toggle inline-flex items-center px-3
    py-1.5 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-xl gap-x-2 hover:bg-blue-700 cursor-pointer">
    <i class="bi bi-filter-circle"></i>
  </button>

  <div role="menu"
    aria-orientation="vertical"
    aria-labelledby="hs-dropdown-default"
    class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-max bg-white border border-gray-300 rounded-3xl mt-2 p-3">
    <div class="p-3 h-75 overflow-y-scroll">
      <form action="{{ route('monitoring.user-region') }}"
        method="GET">
        @if (request('search'))
          <input
            type="hidden"
            name="search"
            value="{{ request('search') }}"
          />
        @endif

        @foreach ($provinces as $province)
          <div class="flex items-center py-2">
            <input
              type="checkbox"
              name="province[]"
              value="{{ $province->code }}"
              class="w-5 h-5 text-blue-500 rounded-[5px] cursor-pointer"
              @checked(in_array($province->code, request('province', [])))
            />

            <span class="ml-3 text-sm whitespace-nowrap">
              {{ $province->name }}
            </span>
          </div>
        @endforeach

        <div class="pt-3 mt-2 border-t border-gray-300">
          <button
            type="submit"
            class="w-full px-3 py-1.5 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 cursor-pointer">
            Filter
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
