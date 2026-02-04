<div class="hidden lg:flex lg:gap-x-4">
  <a href="{{ route('home') }}"
    class="tracking-wide justify-center px-3.5 py-0.75 text-base font-medium leading-6 text-black border border-gray-400
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
        px-3.5 py-0.75 text-lg font-medium leading-6 text-black border border-gray-400 rounded-[13px] bg-blue-200 cursor-pointer hs-dropdown-toggle hover:bg-linear-to-r hover:from-red-200 hover:to-green-200">
        Menu
        <i class="ml-1 text-base bi bi-arrow-down-circle"></i>
      </button>

      <div role="menu"
        aria-orientation="vertical"   aria-labelledby="hs-header-base-mega-menu-fullwidth"
        class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-150 hs-dropdown-open:opacity-100 opacity-0 relative w-full min-w-60 hidden z-10 top-full start-0 before:absolute before:-top-5 before:start-0 before:w-full before:h-5" >

        <div class="bg-white md:mx-6 lg:mx-8 md:rounded-3xl">
          <div class="gap-4 py-1 md:p-4 md:grid md:grid-cols-2 lg:grid-cols-3">

            <div class="bg-sky-100 rounded-2xl">
              <div class="flex flex-col p-2">
                <x-web-default
                  nama-app="Exploreecoding"
                  route="/"
                  :img="asset('image/default.png')"
                  alt="logo-app-content"
                  description="Platform belajar pemrograman untuk menguasai coding dari dasar"
                />
              </div>
            </div>

            <div class="bg-sky-100 rounded-l-2xl">
              <div class="flex flex-col p-2 h-83.5 overflow-y-scroll">
                <span class="ms-2.5 mb-6 tracking-wider font-bold text-base
                  uppercase text-green-700 text-center mt-4">
                  menu utama
                </span>

                <x-web-menu-utama
                  route=""
                  :image="asset('frontend/img/navigation/home.png')"
                  menu="Sitemap"
                  description="Peta navigasi exploreecoding untuk menemukan semua konten"
                  button-name="Sitemap"
                />

                <x-web-menu-utama
                  route=""
                  :image="asset('frontend/img/navigation/home.png')"
                  menu="Silabus"
                  description="Panduan materi pembelajaran terarah dan sistematis exploreecoding"
                  button-name="Silabus"
                />

                <x-web-menu-utama
                  route=""
                  :image="asset('frontend/img/navigation/home.png')"
                  menu="Semua path"
                  description="Kumpulan path belajar coding lengkap untuk semua level"
                  button-name="Semua path"
                />

                <x-web-menu-utama
                  route=""
                  :image="asset('frontend/img/navigation/home.png')"
                  menu="Tips coding"
                  description="Tips pengetahuan untuk meningkatkan skill pemrograman"
                  button-name="Tips coding"
                />

                <x-web-menu-utama
                  route=""
                  :image="asset('frontend/img/navigation/home.png')"
                  menu="Populer course"
                  description="Course unggulan yang paling sering di pelajari pengguna"
                  button-name="Popluer course"
                />

                <x-web-menu-utama
                  route=""
                  :image="asset('frontend/img/navigation/home.png')"
                  menu="Ada ide ? kirim"
                  description="Kirim ide course atau materi baru ke exploreecoding"
                  button-name="Kirim ide"
                />

                <x-web-menu-utama
                  route=""
                  :image="asset('frontend/img/navigation/home.png')"
                  menu="Hubungi kami"
                  description="Kontak resmi exploreecoding untuk pertanyaan dan dukungan"
                  button-name="Hubungi kami"
                />
              </div>
            </div>

            <div class="bg-sky-100 rounded-l-2xl">
              <div class="flex flex-col p-2 h-83.5 overflow-y-scroll">
                <span class="ms-2.5 mb-6 tracking-wider font-bold text-base
                  uppercase text-green-700 text-center mt-4">
                  explore lainnya
                </span>

                <x-web-explore-lainnya
                  route=""
                  :image="asset('frontend/img/explore/app-laravel.png')"
                  menu="App expblogger"
                  description="App blog exploreecoding berisi tentang artikel dan wawasan IT"
                  button-name="blog"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <a href="{{ route('home') }}"
    class="tracking-wide justify-center px-3.5 py-0.75 text-base font-medium leading-6 text-black border border-gray-400
    rounded-[13px] bg-blue-200 hover:bg-blue-300 cursor-pointer">
    About
  </a>
</div>
