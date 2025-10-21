<ol class="flex items-center gap-[4px] mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/navigations.png')"
  />

  <x-slash/>

  <x-breadcrumb-name name="navigations"/>

  <x-slash/>

  <x-breadcrumb-name :name="$navigation->slug"/>

  <x-slash/>

  <x-breadcrumb-name name="edit" class="text-blue-600"/>
</ol>
