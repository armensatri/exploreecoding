<ol class="flex items-center gap-1 mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/statuses.jpg')"
  />

  <x-slash/>

  <x-breadcrumb-name name="statuses"/>

  <x-slash/>

  <x-breadcrumb-name :name="$status->slug"/>

  <x-slash/>

  <x-breadcrumb-name name="edit" class="text-blue-600"/>
</ol>
