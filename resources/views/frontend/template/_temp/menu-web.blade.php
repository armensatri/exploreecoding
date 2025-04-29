<div class="hidden lg:flex lg:gap-x-4">
  <a href="{{ route('home') }}"
    class="tracking-wide justify-center px-3.5 py-[3px] text-base font-medium leading-6 text-black border border-gray-400
    rounded-[13px] bg-blue-200 hover:bg-blue-300 cursor-pointer">
    Home
  </a>

  <div>
    <div class="hs-dropdown [--strategy:static]
      md:[--strategy:absolute] [--adaptive:none] [--is-collapse:true] md:[--is-collapse:false] ">

      <button type="button"
        id="hs-header-base-mega-menu-fullwidth"
        aria-haspopup="menu"
        aria-expanded="false"
        aria-label="Mega Menu"
        class="flex items-center w-auto p-2 tracking-wide justify-center
        px-3.5 py-[3px] text-lg font-medium leading-6 text-black border border-gray-400 rounded-[13px] bg-blue-200 cursor-pointer hs-dropdown-toggle hover:bg-gradient-to-r hover:from-red-200 hover:to-green-200">
        Menu
        <i class="ml-1 text-base bi bi-arrow-down-circle"></i>
      </button>

      <div role="menu"
        aria-orientation="vertical"   aria-labelledby="hs-header-base-mega-menu-fullwidth"
        class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 relative w-full min-w-60 hidden z-10 top-full start-0 before:absolute before:-top-5 before:start-0 before:w-full before:h-5" >

        <div class="bg-white md:mx-6 lg:mx-8 md:rounded-3xl">
          <div
            class="gap-4 py-1 md:p-4 md:grid md:grid-cols-2 lg:grid-cols-3">
            <div class="bg-sky-100 rounded-2xl">
              <div class="flex flex-col p-2">
                <x-explore-coding
                  header="explore coding"
                  logo="/image/default.png"
                  description="Belajar programming online dengan materi terstruktur untuk kuasai coding dari dasar hingga mahir."
                  route="#"
                />
              </div>
            </div>

            <div class="bg-sky-100 rounded-l-2xl">
              <div class="flex flex-col p-2 h-[334px] overflow-y-scroll">
                <x-menu-web-header
                  name="menu utama"
                />

                <x-menu-utama
                  route="#"
                  image="/frontend/img/menu/home.png"
                  menu="HOME"
                  description="Bangun skill coding mu dengan belajar di exploreecoding"
                />

                <x-menu-utama
                  route="#"
                  image="/frontend/img/menu/about.png"
                  menu="ABOUT"
                  description="Tentang coding dan perjalanan membangun platform ini"
                />

                <x-menu-utama
                  route="#"
                  image="/frontend/img/menu/materi.png"
                  menu="MATERI"
                  description="Materi terdiri dari path, roadmap, playlist, dan post, yang akan terus di update"
                />

                <x-menu-utama
                  route="#"
                  image="/frontend/img/menu/sitemap.png"
                  menu="SITEMAP"
                  description="Panduan lengkap untuk menelusuri semua peta situs konten"
                />

                <x-menu-utama
                  route="#"
                  image="/frontend/img/menu/contact.png"
                  menu="CONTACT"
                  description="Hubungi kami untuk pertanyaan, saran, atau kerja sama"
                />

                <x-menu-utama
                  route="#"
                  image="/frontend/img/menu/upnews.png"
                  menu="UPDATE NEWS"
                  description="Update rutin tentang materi baru dan pengumuman penting"
                />

                <x-menu-utama
                  route="#"
                  image="/frontend/img/menu/lebo.png"
                  menu="LEADERBOARD"
                  description="Pengguna teratas dengan progres belajar terbaik saat ini"
                />

                <x-menu-utama
                  route="#"
                  image="/frontend/img/menu/regtu.png"
                  menu="REQUEST TUTORIAL"
                  description="Punya ide tutorial ? Kirim permintaanmu sekarang juga"
                />

                <x-menu-utama
                  route="#"
                  image="/frontend/img/menu/pp.png"
                  menu="PRIVACY POLICY"
                  description="Informasi lengkap tentang hak dan privasi pengunjung situs"
                />

                <x-menu-utama
                  route="#"
                  image="/frontend/img/menu/log.png"
                  menu="UPDATE LOGS"
                  description="Catatan perubahan dan pembaruan platform yang terbaru"
                />
              </div>
            </div>

            <div class="bg-sky-100 rounded-l-2xl">
              <div class="flex flex-col p-2 h-[334px] overflow-y-scroll">
                <x-menu-web-header
                  name="explore lainnya"
                />

                <x-explore-lainnya
                  route="/upcoming"
                  image="/frontend/img/menu/home.png"
                  menu="APP PROJECT"
                  bg="bg-red-200"
                  text="text-red-800"
                  status="upcoming"
                  description="Explore project aplikasi kami untuk pengalaman coding nyata"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <a href="{{ route('home') }}"
    class="tracking-wide justify-center px-3.5 py-[3px] text-base font-medium leading-6 text-black border border-gray-400
    rounded-[13px] bg-blue-200 hover:bg-blue-300 cursor-pointer">
    About
  </a>
</div>
