<ol class="flex items-center gap-1 mb-5">
  <x-breadcrumb-icon
    :image="asset('frontend/img/navigation/categories.png')"
  />

  <x-slash/>

  <x-breadcrumb-name name="tipcoding"/>

  <x-slash/>

  <x-breadcrumb-name :name="$category->name" class="text-blue-600"/>
</ol>
