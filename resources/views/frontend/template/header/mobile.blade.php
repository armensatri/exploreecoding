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
      route=""
      :image="asset('frontend/img/navigation/sitemap.png')"
      menu="Sitemap"
      description="Peta navigasi exploreecoding untuk menemukan semua konten"
      button-name="Sitemap"
    />

    <x-mobile-menu-utama
      route=""
      :image="asset('frontend/img/navigation/silabus.png')"
      menu="Silabus"
      description="Panduan materi pembelajaran terarah dan sistematis exploreecoding"
      button-name="Silabus"
    />

    <x-mobile-menu-utama
      route=""
      :image="asset('frontend/img/navigation/paths.png')"
      menu="Semua path"
      description="Kumpulan path belajar coding lengkap untuk semua level"
      button-name="Semua path"
    />

    <x-mobile-menu-utama
      :route="route('ec-tipscoding.index')"
      :image="asset('frontend/img/navigation/tipscodings.png')"
      menu="✅Tips coding"
      description="Tips pengetahuan untuk meningkatkan skill pemrograman"
      button-name="Tips coding"
    />

    <x-mobile-menu-utama
      route=""
      :image="asset('frontend/img/navigation/paths.png')"
      menu="Populer path course"
      description="Path course unggulan yang paling sering di pelajari pengguna"
      button-name="Populer path"
    />

    <x-mobile-menu-utama
      route=""
      :image="asset('frontend/img/navigation/ide.png')"
      menu="Ada ide ? kirim"
      description="Kirim ide course atau materi baru ke exploreecoding"
      button-name="Kirim ide"
    />

    <x-mobile-menu-utama
      :route="route('ec-tipscoding.index')"
      :image="asset('frontend/img/navigation/contact.png')"
      menu="✅Contact"
      description="Kontak resmi exploreecoding untuk pertanyaan dan dukungan"
      button-name="Contact"
    />
  </div>

  <div class="-my-2">
    <div class="py-2 mt-4 space-y-2">
      <div class="block px-3 py-2 text-base font-bold tracking-wider text-green-700 uppercase">
        explore lainnya
      </div>
    </div>

    <x-mobile-explore-lainnya
      route=""
      :image="asset('image/default.png')"
      menu="Exploreeblog"
      description="App blog exploreeblog berisi tentang artikel dan wawasan IT"
      button-name="Blog"
    />
  </div>
</div>
