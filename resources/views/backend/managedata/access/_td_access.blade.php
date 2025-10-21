<div class="px-6 py-1.5">
  <div class="m-1 hs-dropdown text-center
    [--trigger:hover] relative inline-flex">

    <div id="hs-dropdown-hover-event-{{ $role->id }}"
      aria-haspopup="menu"
      aria-expanded="false"
      aria-label="Dropdown"
      class="inline-flex items-center px-[6px] py-0.5 text-sm font-medium text-slate-900 cursor-pointer hs-dropdown-toggle
      hover:text-blue-600">
      <i class="bi bi-gear-fill"></i>
    </div>

    <div role="menu"
      aria-orientation="vertical"
      aria-labelledby="hs-dropdown-hover-event-{{ $role->id }}"
      class="hs-dropdown-menu transition-[opacity,margin] duration
      z-30 hs-dropdown-open:opacity-100 opacity-0 hidden min-w-max bg-slate-50 border border-gray-400 shadow-md rounded-2xl p-3 space-y-2 mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full">

      <span class="block text-xs font-medium text-gray-800 uppercase">
        {{ $role->id }}
      </span>

      <span class="block mb-4 text-xs font-medium text-gray-600 uppercase">
        Actions
      </span>

      <div class="flex gap-2">
        <div>
          <a href="{{ route('access.menu', [
              'url' => $role->url,
            ]) }}"
            class="inline-flex items-center justify-center px-2.5 py-2 bg-slate-100 rounded-[10px] border border-gray-400 hover:bg-green-100">
            <img src="{{ asset('backend/img/menu/menus.jpg') }}"
              alt="menu"
              class="w-5"
            />
          </a>
        </div>

        <div>
          <a href="{{ route('access.submenu', [
              'url' => $role->url,
            ]) }}"
            class="inline-flex items-center justify-center px-2.5 py-2
            bg-slate-100 rounded-[10px] border border-gray-400 hover:bg-blue-100">
            <img src="{{ asset('backend/img/menu/submenus.jpg') }}"
              alt="menu"
              class="w-5"
            />
          </a>
        </div>

        <div>
          <a href="{{ route('access.permission', [
              'url' => $role->url,
            ]) }}"
            class="inline-flex items-center justify-center px-2.5 py-2
            bg-slate-100 rounded-[10px] border border-gray-400 hover:bg-red-100">
            <img src="{{ asset('backend/img/menu/permissions.jpg') }}"
              alt="menu"
              class="w-5"
            />
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
