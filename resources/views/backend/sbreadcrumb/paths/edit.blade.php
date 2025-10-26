<ol class="flex items-center gap-[4px] mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/paths.png')"
  />

  <x-slash/>

  <x-breadcrumb-name name="paths"/>

  <x-slash/>

  <x-breadcrumb-name :name="$path->slug"/>

  <x-slash/>

  <x-breadcrumb-name name="edit" class="text-blue-600"/>
</ol>
