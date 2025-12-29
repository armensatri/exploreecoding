<ol class="flex items-center gap-1 mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/tipscodings.png')"
  />

  <x-slash/>

  <x-breadcrumb-name name="tipscodings"/>

  <x-slash/>

  <x-breadcrumb-name :name="$tipscoding->slug"
    class="text-blue-600"
  />
</ol>
