<navbar class="top-0 flex w-full bg-[#6777ef] relative">
  <div class="flex items-center justify-between flex-grow px-4 mt-5 mb-11">
    <div class="flex items-center px-4 lg:hidden">
      <button @click.stop="sidebarToggle = !sidebarToggle"
        class="z-99999 block bg-white p-1.5 rounded-lg dark:border-strokedark dark:bg-boxdark lg:hidden shadow-sm hover:bg-gray-100">
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

          <div id="hs-dropdown-hover-event"
            class="inline-flex items-center text-sm font-medium rounded-lg cursor-pointer hs-dropdown-toggle gap-x-2 disabled:opacity-50 disabled:pointer-events-none">

            <picture>
              <img src="{{ Auth::user() && Auth::user()->image ?
                asset('storage/' . Auth::user()->image) :
                '/backend/img/user.png' }}"
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

          <div aria-labelledby="hs-dropdown-hover-event"
            class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-slate-50 shadow-md rounded-3xl p-5 mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 border border-gray-400 before:absolute before:-top-4 before:start-0 before:w-full">

            <div class="py-2 mb-2 first:pt-0 last:pb-0">
              <div class="flex items-center gap-x-3.5 border-b-[1px] pb-2">
                <picture>
                  <img src="{{ Auth::user() && Auth::user()->image ?
                    asset('storage/' . Auth::user()->image) :
                    '/backend/img/user.png' }}"
                    alt="profile"
                    class="w-11 h-11 object-cover object-top rounded-full p-0.5 bg-white"
                  />
                </picture>

                <div class="leading-none">
                  <div class="text-[17px] font-medium tracking-wide text-gray-800">
                    <span>@</span>{{ Auth::user()->username }}
                  </div>

                  <div class="ml-1 text-sm text-gray-700">
                    role {{ Auth::user()->role->slug }}
                  </div>
                </div>
              </div>

              <div class="flex flex-col mt-6 space-y-3.5">
                <x-menu-auth
                  route="#"
                  image="/frontend/img/auth/lebo.png"
                  alt="leaderboard"
                  menu="Leaderboard"
                />

                <x-menu-auth
                  route="#"
                  image="/frontend/img/auth/regtu.png"
                  alt="request"
                  menu="Request"
                />

                <x-menu-auth
                  route="#"
                  image="/frontend/img/auth/activity.png"
                  alt="log-activity"
                  menu="Log activity"
                />

                <x-menu-auth
                  :route="route('home')"
                  image="/frontend/img/menu/home.png"
                  alt="home"
                  menu="Back to home"
                />

                <a href="#"
                  class="ml-1 border-t-[1px] flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-base text-red-600 hover:text-red-800">
                  <i class="text-lg text-red-600 bi bi-trash3-fill"></i>
                  Delete account
                </a>
              </div>
            </div>
            @auth
              <form action="{{ route('auth.logout') }}"
                method="POST">
                @csrf

                <button type="submit"
                  class="px-3 py-1.5 bg-red-600 shadow-sm
                  hover:bg-red-700 rounded-xl w-full">
                  <div class="inline-flex items-center">
                    <i class="text-white bi bi-arrow-right-circle"></i>
                    <span class="ml-1 text-base tracking-wider text-white">
                      Logout
                    </span>
                  </div>
                </button>
              </form>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </div>
</navbar>
