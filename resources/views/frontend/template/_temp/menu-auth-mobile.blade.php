<a href="{{ route('home') }}"
          class="-m-1.5 p-1.5">
          <img src="/frontend/img/logo.jpg"
            alt="logo"
            class="w-auto h-8 rounded-full"
          />
        </a>
        <div>
          @auth
            <div id="dropdownHoverButtonn"
              data-dropdown-toggle="dropdownAuthh"
              data-dropdown-trigger="hover"
              class="flex items-center gap-x-2 tracking-wide justify-center py-[3px] text-base font-medium rounded-[13px] cursor-pointer">

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

              <span class="text-[17px] font-normal tracking-wide text-black truncate sm:block">
                <span>@</span>{{ Auth::user()->username }}
              </span>

              <i class="text-base text-black bi bi-arrow-down-circle"></i>
            </div>

            <div id="dropdownAuthh"
              class="z-10 hidden w-48 bg-white border border-gray-400 divide-y divide-gray-100 shadow rounded-3xl">

              <ul aria-labelledby="dropdownHoverButtonn"
                class="py-2 text-sm text-gray-700 dark:text-gray-200">
                <li>
                  <div class="p-3 dashboard">
                    <span class="block px-3 py-2 text-sm font-medium tracking-wider text-green-700 uppercase">
                      BACK TO
                    </span>

                    <x-route-to-dashboard
                      :route="route(\App\Helpers\Redirects::Dashboard())"
                    />
                  </div>
                </li>

                <form action="{{ route('logout') }}"
                  method="POST" class="flex justify-center">
                  @csrf

                  <button type="submit"
                    class="px-3 py-1 mt-4 mb-6 bg-red-600 shadow-sm hover:bg-red-700 rounded-xl">
                    <div class="inline-flex items-center justify-center">
                      <i class="text-white bi bi-arrow-right-circle"></i>
                      <span class="ml-1 text-base tracking-wider text-white">
                        Logout
                      </span>
                    </div>
                  </button>
                </form>
              </ul>
            </div>
          @else
            <a href=""
              class="px-3.5 mr-2.5 py-1 text-base font-semibold leading-6 text-gray-900 bg-blue-200 border border-gray-400 rounded-xl
              hover:bg-blue-300">
              Login
            </a>

            <a href=""
              class="px-3.5 py-1 text-base font-semibold leading-6 text-gray-900 bg-blue-200 border border-gray-400 rounded-xl
              hover:bg-blue-300">
              Register
            </a>
          @endauth
        </div>
