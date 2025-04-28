<div class="hidden lg:flex lg:flex-1 lg:justify-end">
  @auth
    <div id="dropdownHoverButton"
      data-dropdown-toggle="dropdownAuth"
      data-dropdown-trigger="hover"
      class="flex items-center gap-x-1 tracking-wide justify-center px-3 py-[3px] text-base font-medium rounded-[13px] cursor-pointer">

      <picture>
        <img src="{{ Auth::user() && Auth::user()->image ?
          asset('storage/' . Auth::user()->image) :
          '/backend/img/user.png' }}"
          alt="user-default"
          loading="lazy"
          class="object-cover object-top p-0.5
          bg-white rounded-full w-9 h-9"
        />
      </picture>

      <i class="text-base text-black bi bi-arrow-down-circle"></i>
    </div>

    <div id="dropdownAuth"
      class="z-10 hidden px-6 py-4 mr-8 border border-gray-300 shadow w-60 bg-sky-50 rounded-3xl">

      <ul aria-labelledby="dropdownHoverButton"
        class="py-2 text-sm text-gray-700 dark:text-gray-200">
        <div class="flex items-center gap-x-3.5 border-b-[1px] pb-2">
          <picture>
            <img class="w-11 h-11 rounded-full p-0.5 bg-white" src="/backend/img/user.png" alt="Profile Picture">
          </picture>
          <div class="leading-none">
            <div class="text-base font-medium tracking-wide text-gray-900">
              <span>@</span>{{ Auth::user()->username }}
            </div>
            <div class="ml-1 text-sm text-gray-500">
              role {{ Auth::user()->role->slug }}
            </div>
          </div>
        </div>

        <div class="mt-6 space-y-4">
          <div class="ml-4 inline-flex items-center">
            <i class="text-lg bi bi-gear"></i>
            <div class="m-1 hs-dropdown [--trigger:hover] relative inline-flex">
              <button id="hs-dropdown-hover-event" type="button" class="ml-2 hs-dropdown-toggle flex items-center w-full space-x-3 text-gray-700 hover:text-blue-600" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                Account
                <i class="ml-2 text-sm text-black bi bi-arrow-down-circle"></i>
              </button>

              <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-52 bg-white shadow-md border border-gray-300 rounded-3xl mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-hover-event">
                <div class="p-3 space-y-0.5">
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                    Personal
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                    Public profile
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                    Edit profile
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                    Change password
                  </a>
                </div>
              </div>
            </div>
          </div>
          <a href="" class="inline-flex ml-4">
            <div class="flex items-center w-full space-x-3 text-gray-700 hover:text-blue-600">
              <i class="text-lg bi bi-bar-chart-line"></i>
              <span>Leaderboard</span>
            </div>
          </a>
          <a href="" class="inline-flex ml-4">
            <div class="flex items-center w-full space-x-3 text-gray-700 hover:text-blue-600">
              <i class="text-lg bi bi-bootstrap-reboot"></i>
              <span>Request</span>
            </div>
          </a>
          <a href="" class="inline-flex ml-4">
            <div class="flex items-center w-full space-x-3 text-gray-700 hover:text-blue-600">
              <i class="text-lg bi bi-person-circle"></i>
              <span>Update news</span>
            </div>
          </a>
          <a href="" class="inline-flex ml-4">
            <div class="flex items-center w-full space-x-3 text-gray-700 hover:text-blue-600">
              <i class="text-lg bi bi-person-circle"></i>
              <span>Dashboard</span>
            </div>
          </a>
        </div>

        <!-- Logout Button -->
        <button class="w-full py-2 mt-6 font-semibold text-white bg-red-600 rounded-lg hover:bg-gray-200">
          Log out
        </button>
      </ul>
    </div>
  @else
    <a href="{{ route('login') }}"
      class="px-3.5 py-[3px] text-base font-semibold leading-6 text-gray-900 bg-blue-200 border border-gray-400 rounded-xl
      hover:bg-blue-300">
      Login
    </a>
  @endauth
</div>
