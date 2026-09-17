<div class="hidden lg:flex lg:flex-1 lg:justify-end">
  @auth
    <div class="flex items-center">
      <div class="hs-dropdown [--trigger:click] relative inline-flex">

        <button type="button"
          id="notification-dropdown"
          aria-haspopup="menu"
          aria-expanded="false"
          aria-label="Notifications"
          class="hs-dropdown-toggle relative
          flex items-center justify-center
          w-10 h-10 rounded-full
          text-slate-700
          hover:bg-sky-200
          cursor-pointer">

          <i class="text-xl bi bi-bell"></i>

          @if (Auth::user()->unreadNotifications->count() > 0)
            <span
              class="absolute -top-0.5 -right-0.5
              min-w-5 h-5 px-1
              flex items-center justify-center
              text-[11px] font-semibold
              text-white bg-red-500
              rounded-full border-2 border-sky-100">

              {{ Auth::user()->unreadNotifications->count() }}

            </span>
          @endif

        </button>


        {{-- POPUP NOTIFICATION --}}
        <div
          role="menu"
          aria-orientation="vertical"
          aria-labelledby="notification-dropdown"
          class="hs-dropdown-menu
          transition-[opacity,margin]
          duration-200
          hs-dropdown-open:opacity-100
          opacity-0 hidden

          absolute right-0 top-full
          mt-3

          w-80 sm:w-96

          bg-white
          border border-slate-200
          rounded-2xl
          shadow-xl
          overflow-hidden
          z-50">


          {{-- HEADER --}}
          <div class="flex items-center justify-between
            px-4 py-3
            border-b border-slate-200">

            <div class="font-semibold text-slate-800">
              Notifications
            </div>

            @if (Auth::user()->unreadNotifications->count() > 0)
              <span class="text-xs font-medium text-red-500">
                {{ Auth::user()->unreadNotifications->count() }} baru
              </span>
            @endif

          </div>


          {{-- LIST --}}
          <div class="max-h-96 overflow-y-auto">

            @forelse (
              Auth::user()
                ->notifications
                ->sortByDesc('created_at')
                ->take(5)
              as $notification
            )

              <a href="{{ route('notifications.read', $notification->id) }}"
  class="block px-4 py-3
  border-b border-slate-100
  hover:bg-slate-50
  {{ $notification->read_at
    ? 'bg-white'
    : 'bg-sky-50' }}">

  <div class="flex gap-3">

    <div
      class="shrink-0 w-9 h-9
      flex items-center justify-center
      rounded-full
      {{ $notification->read_at
        ? 'bg-slate-100 text-slate-500'
        : 'bg-sky-100 text-sky-600' }}">

      @if (
        ($notification->data['type'] ?? null)
        === 'tipscoding.comment.reaction'
      )

        <i class="bi bi-heart-fill"></i>

      @elseif (
        ($notification->data['type'] ?? null)
        === 'tipscoding.comment.reply'
      )

        <i class="bi bi-reply-fill"></i>

      @else

        <i class="bi bi-chat-fill"></i>

      @endif

    </div>


    <div class="min-w-0 flex-1">

      <div class="flex items-start justify-between gap-2">

        <div
          class="text-sm
          {{ $notification->read_at
            ? 'font-medium text-slate-700'
            : 'font-semibold text-slate-800' }}">

          {{ \App\Support\TipscodingNotification::message($notification) }}

        </div>

        @if (! $notification->read_at)

          <span
            class="shrink-0 w-2 h-2 mt-1.5
            rounded-full bg-sky-500">
          </span>

        @endif

      </div>


      <div class="mt-1 text-xs text-slate-500 line-clamp-2">
        {{ $notification->data['comment'] ?? '--' }}
      </div>


      <div class="mt-1 text-[11px] text-slate-400">
        {{ $notification->created_at->diffForHumans() }}
      </div>

    </div>

  </div>

</a>

            @empty

              <div class="px-4 py-10 text-center">

                <i class="bi bi-bell-slash text-3xl text-slate-300"></i>

                <div class="mt-2 text-sm text-slate-500">
                  Belum ada notification.
                </div>

              </div>

            @endforelse

          </div>


          {{-- FOOTER --}}
          @if (Auth::user()->notifications->count() > 0)

            <div class="border-t border-slate-200">

              <a href="{{ route('notifications.index') }}"
                class="block px-4 py-3
                text-center text-sm
                font-medium text-sky-600
                hover:bg-sky-50">

                Lihat semua notifications

              </a>

            </div>

          @endif

        </div>

      </div>

      <div class="m-1 hs-dropdown [--trigger:hover] relative inline-flex">
        <div id="hs-dropdown-hover-event-web-auth"
          aria-haspopup="menu"
          aria-expanded="false"
          aria-label="Dropdown"
          class="hs-dropdown-toggle flex items-center gap-x-1 tracking-wide justify-center px-3 py-0.75 cursor-pointer">

          <picture>
            <img src="{{ auth()->user()?->image ? asset('storage/' . auth()->user()->image) : asset('frontend/img/user/user.png') }}"
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
          aria-labelledby="hs-dropdown-hover-event-web-auth"
          class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-56 bg-white rounded-[22px] mt-2 after:h-4 border border-gray-300 after:absolute after:-bottom-4 after:inset-s-0 after:w-full before:h-4 before:absolute before:-top-4 before:inset-s-0 before:w-full">

          <div class="space-y-0.5 p-4">
            <x-menu-auth
              :route="route('dashboard')"
              :img="asset('frontend/img/auth/dashboard.jpg')"
              alt="menu"
              menu="Dashboard"
            />
          </div>

          <div class="space-y-0.5 mt-3 border-t border-t-gray-200
            mx-7 p-3 flex justify-center">
            <form action="{{ route('logout') }}"
              method="POST">
              @csrf
              <button type="submit"
                class="px-3 py-0.75 mb-2 hover:shadow text-red-800 bg-red-200 hover:bg-red-600 hover:text-white rounded-[10px] flex items-center justify-center font-medium text-[15px] cursor-pointer border border-gray-400">
                <i class="bi bi-arrow-right-circle"></i>
                <span class="text-[15px] font-medium ml-1 tracking-wide">
                  Logout
                </span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @else
    <a href="{{ route('login') }}"
      class="px-3.5 py-0.75 text-base font-semibold leading-6 text-gray-900 bg-blue-200 border border-gray-400 rounded-xl
      hover:bg-blue-300">
      Login
    </a>
  @endauth
</div>
