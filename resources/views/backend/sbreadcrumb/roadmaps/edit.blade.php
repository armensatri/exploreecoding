<ol class="flex items-center gap-[4px] mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/users.jpg')"
  />

  <x-slash/>

  <x-breadcrumb-name name="users"/>

  <x-slash/>

  <x-breadcrumb-name :name="'@' . $user->username"/>

  <x-slash/>

  <x-breadcrumb-name name="edit" class="text-blue-600"/>
</ol>
