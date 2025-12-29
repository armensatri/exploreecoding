<ol class="flex items-center gap-1 mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/categories.png')"
  />

  <x-slash/>

  <x-breadcrumb-name name="categories"/>

  <x-slash/>

  <x-breadcrumb-name :name="$category->slug"/>

  <x-slash/>

  <x-breadcrumb-name name="edit" class="text-blue-600"/>
</ol>
