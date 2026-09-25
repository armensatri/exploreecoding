<navbar class="top-0 flex w-full bg-[#6777ef] relative">
  <div class="flex items-center justify-between px-4 mt-5 grow mb-11">
    <div class="flex items-center px-4 lg:hidden">
      <button @click.stop="sidebarToggle = !sidebarToggle"
        class="block bg-white p-1.5 rounded-sm lg:hidden shadow-sm hover:bg-gray-100 cursor-pointer">
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
      <div class="flex items-center">
        {{-- notif --}}
          @php
  $notifications = Auth::user()
    ->notifications
    ->sortByDesc('created_at');

  $unreadCount = $notifications
    ->whereNull('read_at')
    ->count();

  /*
  |--------------------------------------------------------------------------
  | NOTIFICATION 3 HARI TERAKHIR
  |--------------------------------------------------------------------------
  | Hari ini + kemarin + 2 hari sebelumnya.
  |
  | Contoh:
  | Jika hari ini 10 Oktober:
  | 10 Oktober
  | 9 Oktober
  | 8 Oktober
  |--------------------------------------------------------------------------
  */

  $today = now()->startOfDay();

  $latestNotifications = $notifications
    ->filter(
      fn ($notification) =>
        $notification->created_at->gte(
          $today->copy()->subDays(2)
        )
    )
    ->groupBy(
      fn ($notification) =>
        $notification->created_at->format('Y-m-d')
    );
@endphp


<div class="hs-dropdown [--trigger:click] relative inline-flex">

  {{-- ================================================= --}}
  {{-- NOTIFICATION BUTTON --}}
  {{-- ================================================= --}}

  <button
    type="button"
    id="notification-dropdown"
    aria-haspopup="menu"
    aria-expanded="false"
    aria-label="Notifications"
    class="hs-dropdown-toggle relative
      flex items-center justify-center
      w-10 h-10
      rounded-full
      text-slate-700
      hover:bg-sky-200
      transition
      cursor-pointer"
  >

    <i class="text-xl bi bi-bell"></i>


    {{-- ================================================= --}}
    {{-- UNREAD BADGE --}}
    {{-- ================================================= --}}

    @if ($unreadCount > 0)

      <span
        class="absolute -top-0.5 -right-0.5
          min-w-5 h-5 px-1
          flex items-center justify-center
          text-[11px]
          font-semibold
          text-white
          bg-red-500
          rounded-full
          border-2 border-sky-100"
      >
        {{ $unreadCount }}
      </span>

    @endif

  </button>


  {{-- ================================================= --}}
  {{-- POPUP NOTIFICATION --}}
  {{-- ================================================= --}}

  <div
    role="menu"
    aria-orientation="vertical"
    aria-labelledby="notification-dropdown"
    class="hs-dropdown-menu
      transition-[opacity,margin]
      duration-200
      hs-dropdown-open:opacity-100
      opacity-0
      hidden

      absolute
      right-0
      top-full
      mt-3

      w-80
      sm:w-96

      bg-white
      border border-slate-200
      rounded-2xl
      shadow-xl

      overflow-hidden
      z-50"
  >


    {{-- ================================================= --}}
    {{-- HEADER --}}
    {{-- ================================================= --}}

    <div
      class="flex items-center justify-between
        px-4 py-3
        border-b border-slate-200"
    >

      <div class="flex items-center gap-2">

        <div
          class="w-8 h-8
            flex items-center justify-center
            rounded-full
            bg-sky-100
            text-sky-600"
        >
          <i class="bi bi-bell"></i>
        </div>


        <div>

          <div
            class="text-sm
              font-semibold
              text-slate-800"
          >
            Notifications
          </div>


          @if ($unreadCount > 0)

            <div
              class="text-[11px]
                text-slate-400"
            >
              {{ $unreadCount }} notification belum dibaca
            </div>

          @else

            <div
              class="text-[11px]
                text-slate-400"
            >
              Semua sudah dibaca
            </div>

          @endif

        </div>

      </div>


      {{-- ================================================= --}}
      {{-- UNREAD COUNT --}}
      {{-- ================================================= --}}

      @if ($unreadCount > 0)

        <span
          class="px-2 py-1
            text-[11px]
            font-semibold
            text-sky-600
            bg-sky-50
            rounded-full"
        >
          {{ $unreadCount }} baru
        </span>

      @endif

    </div>


    {{-- ================================================= --}}
    {{-- NOTIFICATION LIST --}}
    {{-- ================================================= --}}

    <div class="max-h-96 overflow-y-auto">

      @forelse ($latestNotifications as $date => $dateNotifications)


        {{-- ================================================= --}}
        {{-- DATE GROUP --}}
        {{-- ================================================= --}}

        @php
          $dateCarbon = \Carbon\Carbon::createFromFormat(
            'Y-m-d',
            $date
          );
        @endphp


        {{-- ================================================= --}}
        {{-- DATE HEADER --}}
        {{-- ================================================= --}}

        <div
          class="sticky top-0 z-10
            px-4 py-2
            bg-slate-50/95
            backdrop-blur
            border-b border-slate-100"
        >

          <div
            class="text-[11px]
              font-semibold
              tracking-wide
              text-slate-500"
          >

            @if ($dateCarbon->isToday())

              Hari ini

            @elseif ($dateCarbon->isYesterday())

              Kemarin

            @else

              {{ $dateCarbon->translatedFormat('d F Y') }}

            @endif

          </div>

        </div>


        {{-- ================================================= --}}
        {{-- NOTIFICATIONS --}}
        {{-- ================================================= --}}

        @foreach ($dateNotifications as $notification)

          @php
            $type = $notification->data['type'] ?? null;
            $reaction = $notification->data['reaction'] ?? null;
            $reportStatus = $notification->data['status'] ?? null;
          @endphp


          {{-- ================================================= --}}
          {{-- NOTIFICATION ITEM --}}
          {{-- ================================================= --}}

          <a
            href="{{ route('notifications.read', $notification->id) }}"
            class="group block
              px-4 py-3
              border-b border-slate-100
              transition
              hover:bg-slate-50

              {{ $notification->read_at
                ? 'bg-white'
                : 'bg-sky-50/70' }}"
          >

            <div class="flex gap-3">


              {{-- ================================================= --}}
              {{-- ICON --}}
              {{-- ================================================= --}}

              <div
                class="shrink-0
                  w-9 h-9
                  flex items-center justify-center
                  rounded-full
                  transition

                  {{ $notification->read_at
                    ? 'bg-slate-100 text-slate-500'
                    : 'bg-sky-100 text-sky-600' }}"
              >

                {{-- REACTION --}}
                @if ($type === 'tipscoding.comment.reaction')

                  @if ($reaction === 'like')

                    <i class="bi bi-hand-thumbs-up-fill"></i>

                  @elseif ($reaction === 'dislike')

                    <i class="bi bi-hand-thumbs-down-fill"></i>

                  @else

                    <i class="bi bi-heart-fill"></i>

                  @endif


                {{-- REPLY --}}
                @elseif ($type === 'tipscoding.comment.reply')

                  <i class="bi bi-reply-fill"></i>


                {{-- PINNED --}}
                @elseif ($type === 'tipscoding.comment.pinned')

                  <i class="bi bi-pin-angle-fill"></i>


                {{-- COMMENT --}}
                @elseif ($type === 'tipscoding.comment')

                  <i class="bi bi-chat-fill"></i>


                {{-- REPORT --}}
                @elseif ($type === 'tipscoding.comment.report')

                  <i class="bi bi-flag-fill"></i>


                {{-- REPORT RESULT --}}
                @elseif ($type === 'tipscoding.comment.report.result')

                  @if ($reportStatus === 'resolved')

                    <i class="bi bi-check-circle-fill"></i>

                  @elseif ($reportStatus === 'rejected')

                    <i class="bi bi-x-circle-fill"></i>

                  @else

                    <i class="bi bi-flag-fill"></i>

                  @endif


                {{-- OTHER --}}
                @else

                  <i class="bi bi-bell-fill"></i>

                @endif

              </div>


              {{-- ================================================= --}}
              {{-- CONTENT --}}
              {{-- ================================================= --}}

              <div class="min-w-0 flex-1">


                {{-- ================================================= --}}
                {{-- MESSAGE + UNREAD DOT --}}
                {{-- ================================================= --}}

                <div
                  class="flex items-start justify-between gap-2"
                >

                  <div
                    class="text-sm
                      leading-5
                      line-clamp-2

                      {{ $notification->read_at
                        ? 'font-medium text-slate-700'
                        : 'font-semibold text-slate-800' }}"
                  >

                    {{ \App\Support\TipscodingNotification::message($notification) }}

                  </div>


                  {{-- UNREAD DOT --}}
                  @if (! $notification->read_at)

                    <span
                      class="shrink-0
                        w-2 h-2
                        mt-1.5
                        rounded-full
                        bg-sky-500"
                    ></span>

                  @endif

                </div>


                {{-- ================================================= --}}
                {{-- COMMENT PREVIEW --}}
                {{-- ================================================= --}}

                @if (! empty($notification->data['comment']))

                  <div
                    class="mt-1
                      text-xs
                      leading-5
                      text-slate-500
                      line-clamp-2"
                  >
                    {{ $notification->data['comment'] }}
                  </div>

                @endif


                {{-- ================================================= --}}
                {{-- RELATIVE TIME --}}
                {{-- ================================================= --}}

                <div
                  class="mt-1
                    text-[11px]
                    text-slate-400"
                >
                  {{ $notification->created_at->diffForHumans() }}
                </div>

              </div>

            </div>

          </a>

        @endforeach

      @empty


        {{-- ================================================= --}}
        {{-- EMPTY --}}
        {{-- ================================================= --}}

        <div
          class="px-4 py-10
            text-center"
        >

          <div
            class="mx-auto
              w-12 h-12
              flex items-center justify-center
              rounded-full
              bg-slate-100"
          >

            <i
              class="bi bi-bell-slash
                text-2xl
                text-slate-300"
            ></i>

          </div>


          <div
            class="mt-3
              text-sm
              font-medium
              text-slate-600"
          >
            Belum ada notification.
          </div>


          <div
            class="mt-1
              text-xs
              text-slate-400"
          >
            Notification aktivitas kamu akan muncul di sini.
          </div>

        </div>

      @endforelse

    </div>


    {{-- ================================================= --}}
    {{-- FOOTER --}}
    {{-- ================================================= --}}

    @if ($latestNotifications->isNotEmpty())

      <div
        class="border-t
          border-slate-200"
      >

        <a
          href="{{ route('notifications.index') }}"
          class="flex items-center justify-center gap-2
            px-4 py-3
            text-sm
            font-medium
            text-sky-600
            hover:bg-sky-50
            transition"
        >

          <span>
            Lihat semua notifications
          </span>

          <i class="bi bi-arrow-right"></i>

        </a>

      </div>

    @endif

  </div>

</div>
        {{-- notif --}}

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
            class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-56 bg-white drop-shadow-xs rounded-[22px] mt-2 after:h-4 after:absolute after:-bottom-4 after:inset-s-0 after:w-full before:h-4 border border-gray-300 before:absolute before:-top-4 before:inset-s-0 before:w-full">

            <div class="space-y-0.5 p-4">
              <x-menu-auth
                :route="route('home')"
                :img="asset('backend/img/auth/home.png')"
                alt="home"
                menu="Home"
              />
            </div>

            @auth
              <div class="space-y-0.5 mt-3 border-t border-t-gray-200
                mx-7 p-3 flex justify-center">
                <form action="{{ route('logout') }}"
                  method="POST">
                  @csrf
                  <button type="submit"
                    class="px-3 py-0.75 mb-2 hover:shadow text-red-800 bg-red-200 hover:bg-red-600 hover:text-white rounded-xl flex items-center justify-center font-medium text-[15px] cursor-pointer border border-gray-400">
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
