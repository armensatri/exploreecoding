<div class="hidden lg:flex lg:flex-1 lg:justify-end">
  @auth
    <div id="dropdownHoverButton"
      data-dropdown-toggle="dropdownAuth"
      data-dropdown-trigger="hover"
      class="flex items-center gap-x-2 tracking-wide justify-center px-3 py-[3px] text-base font-medium rounded-[13px] cursor-pointer">

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
      class="z-10 hidden px-6 py-4 mr-8 border border-gray-400 shadow w-60 bg-sky-50 rounded-3xl">

      <ul aria-labelledby="dropdownHoverButton"
        class="py-2 text-sm text-gray-700 dark:text-gray-200">
        <div class="flex items-center gap-x-3.5">
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
          <a href="" class="inline-flex ml-3">
            <div class="flex items-center w-full space-x-3 text-gray-700 hover:text-blue-600">
              <i class="text-lg bi bi-person-circle"></i>
              <span>Public Profile</span>
            </div>
          </a>
          <a href="" class="inline-flex ml-3">
            <div class="flex items-center w-full space-x-3 text-gray-700 hover:text-blue-600">
              <i class="text-lg bi bi-person-circle"></i>
              <span>Public Profile</span>
            </div>
          </a>
          <a href="" class="inline-flex ml-3">
            <div class="flex items-center w-full space-x-3 text-gray-700 hover:text-blue-600">
              <i class="text-lg bi bi-person-circle"></i>
              <span>Public Profile</span>
            </div>
          </a>
          <a href="" class="inline-flex ml-3">
            <div class="flex items-center w-full space-x-3 text-gray-700 hover:text-blue-600">
              <i class="text-lg bi bi-person-circle"></i>
              <span>Public Profile</span>
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
