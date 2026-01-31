<footer class="antialiased bg-sky-100">
  <div class="p-4 mx-auto text-center max-w-7xl md:p-8 lg:p-10">
    <hr class="w-full p-4 my-6 border-sky-200 sm:mx-auto lg:my-8">
    <div class="grid grid-cols-2 gap-8 md:grid-cols-2 lg:grid-cols-4">
      <div>
        <x-footer-menu
          menu="Exploreecoding"
        />
        <ul>
          <x-footer-submenu
            route="#"
            submenu="Tentang kami"
          />
          <x-footer-submenu
            route=""
            submenu="Tips coding"
          />
          <x-footer-submenu
            route=""
            submenu="App component"
          />
        </ul>
      </div>

      <div>
        <x-footer-menu
          menu="Course"
        />
        <ul>
          <x-footer-submenu
            route=""
            submenu="Semua path"
          />
          <x-footer-submenu
            route=""
            submenu="Silabus"
          />
          <x-footer-submenu
            route=""
            submenu="Ada ide ? kirim"
          />
        </ul>
      </div>

      <div>
        <x-footer-menu
          menu="Populer course"
        />
        <ul>
          <x-footer-submenu
            route=""
            submenu="Frontend"
          />
          <x-footer-submenu
            route=""
            submenu="Backend"
          />
          <x-footer-submenu
            route=""
            submenu="Struktur data"
          />
        </ul>
      </div>

      <div>
        <x-footer-menu
          menu="Support"
        />
        <ul>
          <x-footer-submenu
            route=""
            submenu="Hubungi kami"
          />
          <x-footer-submenu
            route=""
            submenu="Syarat dan ketentuan"
          />
          <x-footer-submenu
            route=""
            submenu="Privacy"
          />
        </ul>
      </div>
    </div>

    <hr class="max-w-md my-6 border-sky-200 sm:mx-auto lg:my-8">

    <div class="w-full mt-6">
      <div class="mb-4 text-base font-bold text-center text-black uppercase">
        Ikuti Sosial Media Kami
      </div>

      <div class="flex justify-center mb-5 item-center">
        <a href="###"
          class="mx-1.5 rounded-full ring-1 ring-slate-500 ring-offset-2">
          <img src="/frontend/img/sosmed/youtube.png"
            alt="youtube"
            loading="lazy"
            class="w-8 h-8 drop-shadow-sm"
          />
        </a>

        <a href="###"
          class="mx-1.5 rounded-full ring-1 ring-slate-500 ring-offset-2">
          <img src="/frontend/img/sosmed/instagram.png"
            alt="instagram"
            loading="lazy"
            class="w-8 h-8 drop-shadow-sm"
          />
        </a>

        <a href="###"
          class="mx-1.5 rounded-full ring-1 ring-slate-500 ring-offset-2">
          <img src="/frontend/img/sosmed/tiktok.png"
            alt="tiktok"
            loading="lazy"
            class="w-8 h-8 drop-shadow-sm"
          />
        </a>

        <a href="###"
          class="mx-1.5 rounded-full ring-1 ring-slate-500 ring-offset-2">
          <img src="/frontend/img/sosmed/twitter.png"
            alt="twitter"
            loading="lazy"
            class="w-8 h-8 drop-shadow-sm"
          />
        </a>

        <a href="###"
          class="mx-1.5 rounded-full ring-1 ring-slate-500 ring-offset-2">
          <img src="/frontend/img/sosmed/facebook.png"
            alt="facebook"
            loading="lazy"
            class="w-8 h-8 drop-shadow-sm"
          />
        </a>
      </div>

      <p class="flex items-center justify-center gap-2 mt-4 mb-4">
        <span class="ml-2 text-base font-medium tracking-wide text-black">
          Copyright©
        </span>

        <span class="text-base font-medium tracking-wide text-blue-600">
          <a href="#"
            class="underline underline-offset-2">
            exploreecoding™
          </a>
        </span>

        <span class="flex items-center text-sm font-medium tracking-wide text-black">
          010123{{ date('y') }}
        </span>
      </p>
    </div>
  </div>
</footer>
