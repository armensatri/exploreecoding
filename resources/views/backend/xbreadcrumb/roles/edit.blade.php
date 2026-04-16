<ol class="flex items-center gap-[4px] mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/roles.jpg')"
  />

  <x-slash/>

  <x-breadcrumb-name name="roles"/>

  <x-slash/>

  <x-breadcrumb-name :name="$role->slug"/>

  <x-slash/>

  <x-breadcrumb-name name="edit" class="text-blue-600"/>
</ol>
