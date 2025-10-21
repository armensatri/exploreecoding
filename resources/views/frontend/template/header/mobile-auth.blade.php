<a href="{{ route('home') }}"
  class="-m-1.5 p-1.5">
  <img src="{{ asset('/frontend/img/logo/logo.png') }}"
    alt="logo"
    class="w-[34px] h-[34px] rounded-full"
  />
</a>

<div>
  @auth
    <div class="m-1 hs-dropdown [--trigger:hover] relative inline-flex">
      <div id="hs-dropdown-hover-event-mobile-auth"
        aria-haspopup="menu"
        aria-expanded="false"
        aria-label="Dropdown"
        class="hs-dropdown-toggle flex items-center gap-x-1 tracking-wide justify-center px-3 py-[3px] cursor-pointer">

        <picture>
          <img src="{{ Auth::user()->image ??
            'frontend/img/user/user.png' }}"
            alt="user-profile"
            class="object-cover object-top p-0.5
            bg-white rounded-full w-9 h-9"
          />
        </picture>

        <span class="text-[17px] font-normal tracking-normal
          text-slate-800 truncate sm:block">
          <span>@</span>{{ Auth::user()->username }}
        </span>

        <i class="text-base text-black bi bi-arrow-down-circle"></i>
      </div>

      <div role="menu"
        aria-orientation="vertical"
        aria-labelledby="hs-dropdown-hover-event-mobile-auth"
        class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-56 bg-white rounded-[22px] mt-2 after:h-4 border border-gray-300 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full">

        <div class="space-y-0.5 p-4">
          <x-menu-auth
            :route="route(\App\Helpers\Redirects::Dashboard())"
            :img="asset('frontend/img/auth/dashboard.jpg')"
            alt="menu"
            menu="Dashboard"
          />
        </div>

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
      </div>
    </div>
  @else
    <a href="{{ route('login') }}"
      class="px-3.5 mr-2.5 py-1 text-base font-semibold leading-6 text-gray-900 bg-blue-200 border border-gray-400 rounded-xl
      hover:bg-blue-300">
      Login
    </a>

    <a href="{{ route('register') }}"
      class="px-3.5 py-1 text-base font-semibold leading-6 text-gray-900 bg-blue-200 border border-gray-400 rounded-xl
      hover:bg-blue-300">
      Register
    </a>
  @endauth
</div>
