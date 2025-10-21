<ol class="flex items-center gap-[5px] mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/profile.jpg')"
  />

  <x-slash/>

  <x-breadcrumb-name name="profile"/>

  <x-slash/>

  <x-breadcrumb-name :name="'@' . $user->username" class="text-blue-600"/>
</ol>
