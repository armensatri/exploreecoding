<div class="px-8 py-3 ">
  <input type="checkbox"
    data-role="{{ $role->id }}"
    data-menu="{{ $menu->id }}"
    data-slug="{{ $role->slug }}"
    data-has-access="{{ $menu->has_access ? '1' : '0' }}"
    {{ $menu->has_access ? 'checked' : '' }}
    class="w-4 h-4 text-blue-500 rounded-[5px] cursor-pointer access-checkbox outline-offset-1 outline-1 outline-blue-500"
  />
</div>
