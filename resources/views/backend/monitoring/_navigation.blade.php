<button type="button"
  data-modal-target="authentication-modal"
  data-modal-toggle="authentication-modal"
  class="bg-blue-300 border border-gray-400
  hover:bg-blue-400 text-black  shadow-sm font-semibold
  rounded-[14px] text-lg px-4 py-2 tracking-wide cursor-pointer">
  Menu monitoring
</button>

<div id="authentication-modal"
  tabindex="-1" aria-hidden="true"
  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative lg:ml-62.5 w-full max-w-md max-h-full p-4">
    <div
      class="relative p-4 border shadow-sm bg-neutral-primary-soft border-default rounded-base md:p-6">
      <div
        class="flex items-center justify-between pb-4 border-b border-default md:pb-5">
        <h3 class="text-xl font-bold text-gray-700">
          Semua menu data
          <span class="text-blue-500">
            monitoring
          </span>
        </h3>

        <button type="button"
          data-modal-hide="authentication-modal"
          class="inline-flex items-center justify-center w-8 h-8 text-sm text-black bg-gray-200 border border-gray-300 rounded-full cursor-pointer ms-auto hover:bg-red-600 hover:text-white">
          <svg aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            fill="none"
            viewBox="0 0 24 24"
            class="w-5 h-5">
            <path stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M6 18 17.94 6M18 18 6.06 6"
            />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>

      <div class="pt-4 md:pt-6">
        <div class="flex flex-wrap gap-2">
          <x-visitor-navigation
            :route="route('monitoring')"
            active="monitoring"
            menu-name="Monitoring"
          />
          <x-visitor-navigation
            :route="route('monitoring.path-view')"
            active="monitoring/path-view"
            menu-name="Path view"
          />
          <x-visitor-navigation
            :route="route('monitoring.tipscoding-view')"
            active="monitoring/tipscoding-view"
            menu-name="Tipscoding view"
          />
          <x-visitor-navigation
            route=""
            active=""
            menu-name="User sosmed"
          />
          <x-visitor-navigation
            route=""
            active=""
            menu-name="User region"
          />
        </div>
      </div>
    </div>
  </div>
</div>
