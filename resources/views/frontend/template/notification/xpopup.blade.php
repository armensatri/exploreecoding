@php
  $notifications = Auth::user()
    ->notifications
    ->sortByDesc('created_at');

  $unreadCount = $notifications
    ->whereNull('read_at')
    ->count();

  // Notifikasi 3 hari terakhir:
  // hari ini + kemarin + 2 hari sebelumnya.
  // Contoh jika hari ini 10 Oktober:
  // 10 Oktober, 9 Oktober, 8 Oktober.

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
  {{-- Notification button --}}
  <button
    type="button"
    id="notification-dropdown"
    aria-haspopup="menu"
    aria-expanded="false"
    aria-label="Notifications"
    class="relative flex items-center justify-center w-10 h-10 transition rounded-full cursor-pointer hs-dropdown-toggle text-slate-700 hover:bg-sky-200">
    <i class="text-xl bi bi-bell"></i>

    {{-- Unread badge --}}
    @if ($unreadCount > 0)
      <span class="absolute -top-0.5 -right-0.5 min-w-5 h-5 px-1 flex items-center justify-center text-[11px] font-semibold text-white bg-red-500 rounded-full border-2 border-sky-100">
        {{ $unreadCount }}
      </span>
    @endif
  </button>

  {{-- Popup notification --}}
  <div role="menu" aria-orientation="vertical" aria-labelledby="notification-dropdown" class="hs-dropdown-menu transition-[opacity,margin] duration-200 hs-dropdown-open:opacity-100 opacity-0 hidden absolute right-0 top-full mt-3 w-80 sm:w-96 bg-white border border-slate-200 rounded-2xl shadow-xl overflow-hidden z-50">

    {{-- Header --}}
    <div class="flex items-center justify-between px-4 py-3 border-b border-slate-200">
      <div class="flex items-center gap-2">
        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-sky-100 text-sky-600">
          <i class="bi bi-bell"></i>
        </div>

        <div>
          <div class="text-sm font-semibold text-slate-800">
            Notifications
          </div>

          @if ($unreadCount > 0)
            <div class="text-[11px] text-slate-400">
              {{ $unreadCount }}
              notification belum dibaca
            </div>
          @else
            <div class="text-[11px] text-slate-400">
              Semua sudah dibaca
            </div>
          @endif
        </div>
      </div>

      {{-- Unread count --}}
      @if ($unreadCount > 0)
        <span class="px-2 py-1 text-[11px] font-semibold text-sky-600 bg-sky-50 rounded-full">
          {{ $unreadCount }}
          baru
        </span>
      @endif
    </div>

    {{-- Notification list --}}
    <div class="overflow-y-auto max-h-96">
      @forelse ($latestNotifications as $date => $dateNotifications)

        {{-- Date group --}}
        @php
          $dateCarbon = \Carbon\Carbon::createFromFormat(
            'Y-m-d',
            $date
          );
        @endphp

        {{-- Date header --}}
        <div class="sticky top-0 z-10 px-4 py-2 border-b bg-slate-50/95 backdrop-blur border-slate-100">
          <div class="text-[11px] font-semibold tracking-wide text-slate-500">
            @if ($dateCarbon->isToday())
              Hari ini
            @elseif ($dateCarbon->isYesterday())
              Kemarin
            @else
              {{ $dateCarbon->translatedFormat('d F Y') }}
            @endif
          </div>
        </div>

        {{-- Notification --}}
        @foreach ($dateNotifications as $notification)
          @php
            $type = $notification->data['type'] ?? null;
            $reaction = $notification->data['reaction'] ?? null;
            $reportStatus = $notification->data['status'] ?? null;
          @endphp

          {{-- Notification item --}}
          <a href="{{ route('notifications.read', $notification->id) }}" class="group block px-4 py-3 border-b border-slate-100 transition hover:bg-slate-50 {{ $notification->read_at ? 'bg-white' : 'bg-sky-50/70' }}">
            <div class="flex gap-3">

              {{-- Icon --}}
              <div class="shrink-0 w-9 h-9 flex items-center justify-center rounded-full transition {{ $notification->read_at ? 'bg-slate-100 text-slate-500' : 'bg-sky-800 text-sky-600' }}">

                {{-- Reaction --}}
                @if ($type === 'tipscoding.comment.reaction')
                  @if ($reaction === 'like')
                    <i class="bi bi-hand-thumbs-up-fill"></i>
                  @elseif ($reaction === 'dislike')
                    <i class="bi bi-hand-thumbs-down-fill"></i>
                  @else
                    <i class="bi bi-heart-fill"></i>
                  @endif

                {{-- Reply --}}
                @elseif ($type === 'tipscoding.comment.reply')
                  <i class="bi bi-reply-fill"></i>

                {{-- Pinned --}}
                @elseif ($type === 'tipscoding.comment.pinned')
                  <i class="bi bi-pin-angle-fill"></i>

                {{-- Comment --}}
                @elseif ($type === 'tipscoding.comment')
                  <i class="bi bi-chat-fill"></i>

                {{-- Report --}}
                @elseif ($type === 'tipscoding.comment.report')
                  <i class="bi bi-flag-fill"></i>

                {{-- Report result --}}
                @elseif ($type === 'tipscoding.comment.report.result')
                  @if ($reportStatus === 'resolved')
                    <i class="bi bi-check-circle-fill"></i>
                  @elseif ($reportStatus === 'rejected')
                    <i class="bi bi-x-circle-fill"></i>
                  @else
                    <i class="bi bi-flag-fill"></i>
                  @endif

                {{-- Other --}}
                @else
                  <i class="bi bi-bell-fill"></i>
                @endif
              </div>

              {{-- Content --}}
              <div class="flex-1 min-w-0">

                {{-- Message + unread dot --}}
                <div class="flex items-start justify-between gap-2">
                  <div class="text-sm leading-5 line-clamp-2 {{ $notification->read_at ? 'font-medium text-slate-700' : 'font-semibold text-slate-800' }}">
                    {{ \App\Support\TipscodingNotification::message($notification) }}
                  </div>

                  {{-- Unread dot --}}
                  @if (! $notification->read_at)
                    <span class="shrink-0 w-2 h-2 mt-1.5 rounded-full bg-sky-500"></span>
                  @endif
                </div>

                {{-- Comment preview --}}
                @if (! empty($notification->data['comment']))
                  <div class="mt-1 text-xs leading-5 text-slate-500 line-clamp-2">
                    {{ $notification->data['comment'] }}
                  </div>
                @endif

                {{-- Relative time --}}
                <div class="mt-1 text-[11px] text-slate-400">
                  {{ $notification->created_at->diffForHumans() }}
                </div>

              </div>
            </div>
          </a>
        @endforeach

      @empty

        {{-- Empty --}}
        <div class="px-4 py-10 text-center">
          <div class="flex items-center justify-center w-12 h-12 mx-auto rounded-full bg-slate-100">
            <i class="text-2xl bi bi-bell-slash text-slate-300"></i>
          </div>

          <div class="mt-3 text-sm font-medium text-slate-600">
            Belum ada notification.
          </div>

          <div class="mt-1 text-xs text-slate-400">
            Notification aktivitas kamu akan muncul di sini.
          </div>
        </div>

      @endforelse
    </div>

    {{-- Footer --}}
    @if ($latestNotifications->isNotEmpty())
      <div class="border-t border-slate-200">
        <a href="{{ route('notifications.index') }}" class="flex items-center justify-center gap-2 px-4 py-3 text-sm font-medium transition text-sky-600 hover:bg-sky-50">
          <span>Lihat semua notifications</span>
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    @endif

  </div>
</div>
