<ol class="flex items-center gap-[5px] mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/dashboard.jpg')"
  />

  <x-slash/>

  <x-breadcrumb-name :name="$owner->role->name"
    class="text-blue-600"
  />
</ol>
