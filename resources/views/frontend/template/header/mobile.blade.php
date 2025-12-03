<div class="flow-root mt-10">
  <div class="-my-2 divide-y divide-gray-500/10">
    <div class="py-1.5 bg-sky-100 rounded-3xl border border-gray-300">
      <x-mobile-default
        nama-app="Exploreecoding"
        route="/"
        :img="asset('image/default.png')"
        alt="logo-app-content"
        description="Platform belajar pemrograman untuk menguasai coding dari dasar"
      />
    </div>
  </div>

  <div class="mt-4 -my-2">
    <div class="py-2 space-y-2">
      <div class="block px-3 py-2 text-base font-bold tracking-wider text-green-700 uppercase">
        menu utama
      </div>
    </div>

    <x-mobile-menu-utama
      :route="route('home')"
      :image="asset('frontend/img/navigation/home.png')"
      menu="Home"
      description="Welcome back exploreecoding belajar pemograman terstruktur dan gratis"
      button-name="Home"
    />
  </div>

  <div class="-my-2">
    <div class="py-2 mt-4 space-y-2">
      <div class="block px-3 py-2 text-base font-bold tracking-wider text-green-700 uppercase">
        explore lainnya
      </div>
    </div>

    <x-mobile-explore-lainnya
      :route="url('https://laravel.com')"
      :image="asset('frontend/img/explore/app-laravel.png')"
      menu="App Laravel"
      description="Laravel php framework dengan syntax elegan dan powerfull"
      button-name="Laravel"
    />
  </div>
</div>
