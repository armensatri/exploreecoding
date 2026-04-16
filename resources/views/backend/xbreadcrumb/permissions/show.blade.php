<ol class="flex items-center gap-[4px] mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/permissions.jpg')"
  />

  <x-slash/>

  <x-breadcrumb-name name="permissions"/>

  <x-slash/>

  <x-breadcrumb-name :name="$permission->slug"
    class="text-blue-600"
  />
</ol>
