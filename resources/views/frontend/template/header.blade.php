<header x-data="{ openSidebar: false }"
  class="fixed inset-x-0 top-0 z-20 max-w-full mx-auto antialiased bg-sky-100">

  <nav aria-label="Global"
    class="flex items-center justify-between p-5 lg:px-8">
    <div class="flex lg:flex-1">
      <a href="{{ route('home') }}"
        class="-m-1.5 p-1.5">
        <img src="{{ asset('/frontend/img/logo/logo.png') }}"
          alt="logo"
          class="w-8.5 h-8.5 rounded-full"
        />
      </a>
    </div>

    <div class="flex lg:hidden">
      <button @click="openSidebar = true"
        type="button"
        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <svg fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          aria-hidden="true"
          class="w-6 h-6">
          <path stroke-linecap="round"
            stroke-linejoin="round"
            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
          />
        </svg>
      </button>
    </div>

    <!-- MENU WEB -->
    @include('frontend.template.header.web')

    <!-- MENU WEB AUTH -->
    @include('frontend.template.header.web-auth')
  </nav>

  <div x-show="openSidebar"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opcity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-500"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="lg:hidden" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-50"></div>
    <div class="fixed inset-y-0 right-0 z-50 w-full px-6 py-5 overflow-y-auto bg-sky-50 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
      <div class="flex items-center justify-between">
        <!-- MENU MOBILE AUTH -->
        @include('frontend.template.header.mobile-auth')

        <button @click="openSidebar = false"
          type="button"
          class="-m-2.5 rounded-md p-2.5 text-gray-700">
          <svg fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            aria-hidden="true"
            class="p-1 rounded-full w-7 h-7 hover:bg-red-500 hover:text-white hover:border hover:border-gray-600 cursor-pointer">
            <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </button>
      </div>

      <!-- MENU MOBILE -->
      @include('frontend.template.header.mobile')
    </div>
  </div>
</header>
