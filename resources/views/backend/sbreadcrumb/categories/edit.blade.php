<ol class="flex items-center gap-1 mb-5 ml-2">
  <x-breadcrumb-icon
    :image="asset('backend/img/menu/posts.png')"
  />

  <x-slash/>

  <x-breadcrumb-name name="posts"/>

  <x-slash/>

  <x-breadcrumb-name :name="$post->slug"/>

  <x-slash/>

  <x-breadcrumb-name name="edit" class="text-blue-600"/>
</ol>
