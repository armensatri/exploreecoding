<ol class="flex items-center gap-[4px] mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/menus.jpg')"
  />

  <x-slash/>

  <x-breadcrumb-name name="menus"/>

  <x-slash/>

  <x-breadcrumb-name :name="$menu->slug"/>

  <x-slash/>

  <x-breadcrumb-name name="edit" class="text-blue-600"/>
</ol>
