<navbar class="top-0 flex w-full bg-[#6777ef] relative">
  <div class="flex items-center justify-between flex-grow px-4 mt-5 mb-11">
    <div class="flex items-center px-4 lg:hidden">
      <button @click.stop="sidebarToggle = !sidebarToggle"
        class="block bg-white p-1.5 rounded-lg dark:border-strokedark dark:bg-boxdark lg:hidden shadow-sm hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="16"
          fill="currentColor"
          class="bi bi-list"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"
          />
        </svg>
      </button>
    </div>

    <div class="hidden sm:block"></div>

    <div class="flex items-center px-4">
      <div>
        <div class="m-1 z-40 hs-dropdown [--trigger:hover] relative
          inline-flex">

          <div id="hs-dropdown-hover-event-backend"
            class="inline-flex items-center text-sm font-medium rounded-lg cursor-pointer hs-dropdown-toggle gap-x-2 disabled:opacity-50 disabled:pointer-events-none">

            <picture>
              <img src="{{ Auth::user()->image ?
                asset('storage/' . Auth::user()->image) :
                '/backend/img/user/user.png' }}"
                alt="image-user"
                loading="lazy"
                class="object-cover object-top p-0.5
                bg-white rounded-full w-9 h-9"
              />
            </picture>

            <span class="hidden text-[17px] font-normal tracking-wide text-white truncate sm:block">
              <span>@</span>{{ Auth::user()->username }}
            </span>

            <i class="text-base text-white bi bi-arrow-down-circle"></i>
          </div>

          <div aria-labelledby="hs-dropdown-hover-event-backend"
            class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-56 bg-white drop-shadow-xs rounded-[22px] mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 border border-gray-300 before:absolute before:-top-4 before:start-0 before:w-full">

            <div class="space-y-0.5 p-4">
              <x-menu-auth
                :route="route('home')"
                :img="asset('backend/img/auth/home.png')"
                alt="home"
                menu="Home"
              />
            </div>

            @auth
              <div class="space-y-0.5 mt-3 border-t-[1px] border-t-gray-200
                mx-7 p-3 flex justify-center">
                <form action="{{ route('logout') }}"
                  method="POST">
                  @csrf
                  <button type="submit"
                    class="px-3 py-[3px] mb-2 hover:shadow text-red-800 bg-red-200 hover:bg-red-600 hover:text-white rounded-xl flex items-center justify-center font-medium text-[15px] cursor-pointer border border-gray-400">
                    <i class="bi bi-arrow-right-circle"></i>
                    <span class="text-[15px] font-medium ml-1 tracking-wide">
                      Logout
                    </span>
                  </button>
                </form>
              </div>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </div>
</navbar>
