<ol class="flex items-center gap-[5px] mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/access.png')"
  />

  <x-slash/>

  <x-breadcrumb-name name="access"/>

  <x-slash/>

  <x-breadcrumb-name name="submenu"/>

  <x-slash/>

  <x-breadcrumb-name :name="$role->name" class="text-blue-600"/>
</ol>
