<ol class="flex items-center gap-1 mb-5 ml">
  <x-breadcrumb-icon
    :image="asset('frontend/img/navigation/categories.png')"
  />

  <x-slash/>

  <x-breadcrumb-name name="tipscoding"/>

  <x-slash/>

  <x-breadcrumb-name name="category"/>

  <x-slash/>

  <x-breadcrumb-name :name="$category->slug" class="text-blue-600"/>
</ol>
