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
      :image="url('frontend/img/navigation/home.png')"
      menu="home"
      description="Welcome back exploreecoding belajar pemograman terstruktur dan gratis"
      button-name="home"
    />
  </div>

  <div class="-my-2">
    <div class="py-2 mt-4 space-y-2">
      <div class="block px-3 py-2 text-base font-bold tracking-wider text-green-700 uppercase">
        explore lainnya
      </div>
    </div>

    @foreach ($explores as $explore)
      <x-mobile-explore-lainnya
        :route="$explore->routee"
        :image="\App\Enums\ExploreIcon::get($explore->name)"
        :menu="$explore->name"
        :description="$explore->description"
        :button-name="$explore->button_name"
      />
    @endforeach
  </div>
</div>
