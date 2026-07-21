<ol class="flex items-center gap-1.5 mb-5 ml-1 max-w-2xs md:max-w-md
  overflow-x-auto breadcrumb-scroll whitespace-nowrap px-1">
  <x-breadcrumb-icon
    :image="asset('frontend/img/navigation/tipscodings.png')"
  />

  <x-slash/>

  <x-breadcrumb-name name="tipscodings"/>

  <x-slash/>

  <x-breadcrumb-name name="category"/>

  <li class="text-xs text-gray-700">:</li>

  <x-breadcrumb-name :name="$category->slug" class="text-blue-600"/>

  <x-slash/>

  <x-breadcrumb-name name="tips"/>

  <li class="text-xs text-gray-700">:</li>

  <x-breadcrumb-name :name="$tipscoding->slug" class="text-blue-600"/>
</ol>
