<ol class="flex items-center gap-[4px] mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/roadmaps.png')"
  />

  <x-slash/>

  <x-breadcrumb-name name="roadmaps"/>

  <x-slash/>

  <x-breadcrumb-name :name="$roadmap->slug"
    class="text-blue-600"
  />
</ol>
