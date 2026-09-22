@extends('frontend.template.main')

@section('content-frontend')

  <div class="max-w-3xl mx-auto px-4 py-8">

     <div class="alert">
        @if (session()->has('alert'))
          @include('sweetalert::alert')
        @endif
      </div>

    {{-- ================================================= --}}
    {{-- HEADER --}}
    {{-- ================================================= --}}

    <div class="mb-6">

      <div class="flex items-center justify-between gap-4">

        <div>

          <h1
            class="text-2xl
              font-bold
              tracking-tight
              text-slate-800"
          >
            Notifications
          </h1>

          <p
            class="mt-1
              text-sm
              text-slate-500"
          >
            Semua aktivitas terbaru yang berkaitan dengan akun kamu.
          </p>

           @if ($unreadCount > 0)

      <form
        action="{{ route('notifications.read-all') }}"
        method="POST"
      >
        @csrf
        @method('PATCH')

        <button
          type="submit"
          class="inline-flex items-center gap-2
                 px-3 py-2
                 text-sm font-medium
                 text-slate-600
                 bg-white
                 border border-slate-200
                 rounded-lg
                 hover:bg-slate-50
                 transition"
        >
          <i class="bi bi-check2-all"></i>

          <span class="hidden sm:inline">
            Tandai semua sudah dibaca
          </span>
        </button>

      </form>

    @endif


    @if ($notifications->total() > 0)

      <form
  action="{{ route('notifications.delete-all') }}"
  method="POST"
  data-confirm-delete-all
>
  @csrf
  @method('DELETE')

  <button
    type="submit"
    class="inline-flex items-center gap-2
           px-3 py-2
           text-sm font-medium
           text-red-600
           bg-white
           border border-red-200
           rounded-lg
           hover:bg-red-50
           transition"
  >
    <i class="bi bi-trash3"></i>

    <span class="hidden sm:inline">
      Hapus semua
    </span>
  </button>

</form>

    @endif

        </div>


        {{-- UNREAD COUNT --}}
        @php
          $unreadCount = $notifications
            ->whereNull('read_at')
            ->count();
        @endphp

        @if ($unreadCount > 0)

          <div
            class="shrink-0
              px-3 py-1.5
              text-xs
              font-semibold
              text-sky-600
              bg-sky-50
              rounded-full
              border border-sky-100"
          >
            {{ $unreadCount }} belum dibaca
          </div>

        @endif

      </div>

    </div>


    {{-- ================================================= --}}
    {{-- NOTIFICATION LIST --}}
    {{-- ================================================= --}}

    <div class="space-y-3">

      @forelse ($notifications as $notification)

        <div
          class="group relative flex gap-4 p-4
                border border-slate-200
                rounded-xl
                {{ is_null($notification->read_at)
                    ? 'bg-blue-50/60'
                    : 'bg-white' }}"
          >

          {{-- ICON --}}
          <div class="shrink-0">

            @php
              $type = $notification->data['type'] ?? null;
              $reaction = $notification->data['reaction'] ?? null;

              $icon = match ($type) {
                  'tipscoding.comment.reaction' => match ($reaction) {
                      'like' => 'bi-hand-thumbs-up-fill',
                      'dislike' => 'bi-hand-thumbs-down-fill',
                      default => 'bi-heart-fill',
                  },

                  'tipscoding.comment.reply' => 'bi-reply-fill',

                  'tipscoding.comment.pinned' => 'bi-pin-angle-fill',

                  'tipscoding.comment' => 'bi-chat-fill',

                  default => 'bi-bell-fill',
              };
            @endphp

            <div
              class="flex items-center justify-center
                    w-10 h-10
                    rounded-full
                    bg-slate-100
                    text-slate-600"
            >
              <i class="bi {{ $icon }}"></i>
            </div>

          </div>


          {{-- CONTENT --}}
          <div class="min-w-0 flex-1 pr-10">

            <a
              href="{{ route('notifications.read', $notification->id) }}"
              class="block"
            >

              <div class="flex items-start gap-2">

                <div class="font-medium text-slate-800">
                  {{ \App\Support\TipscodingNotification::message($notification) }}
                </div>

                @if (is_null($notification->read_at))
                  <span
                    class="mt-2 w-2 h-2 shrink-0
                          rounded-full bg-blue-500"
                  ></span>
                @endif

              </div>


              @if (!empty($notification->data['comment']))

                <p
                  class="mt-1 text-sm text-slate-500
                        line-clamp-2"
                >
                  {{ $notification->data['comment'] }}
                </p>

              @endif


              <div
                class="flex items-center gap-2
                      mt-2 text-xs text-slate-400"
              >

                <span>
                  {{ $notification->created_at->diffForHumans() }}
                </span>

                <span>•</span>

                <span>
                  {{ is_null($notification->read_at) ? 'Belum dibaca' : 'Sudah dibaca' }}
                </span>

              </div>

            </a>

          </div>


          {{-- DELETE --}}
          <form
            action="{{ route('notifications.delete', $notification->id) }}"
            method="POST"
            class="absolute top-3 right-3"
          >

            @csrf
            @method('DELETE')

            <button
              type="submit"
              title="Hapus notification"
              class="flex items-center justify-center
                    w-8 h-8
                    rounded-lg
                    text-slate-400
                    hover:text-red-500
                    hover:bg-red-50
                    transition"
            >
              <i class="bi bi-trash3"></i>
            </button>

          </form>

        </div>

      @empty

        <div class="py-12 text-center">

          <i
            class="bi bi-bell-slash
                  text-4xl text-slate-300"
          ></i>

          <p class="mt-3 text-slate-500">
            Belum ada notification.
          </p>

        </div>

      @endforelse

    </div>


    {{-- ================================================= --}}
    {{-- PAGINATION --}}
    {{-- ================================================= --}}

    <div class="grid table-pagination">

          @if ($notifications->lastPage() > 1)

            <x-paginate
              :pagination="$notifications"
            />

          @endif

        </div>

  </div>

@endsection

@push('scripts')

<script>
  document.addEventListener('DOMContentLoaded', () => {

    const form = document.querySelector(
      '[data-confirm-delete-all]'
    );

    if (!form) {
      return;
    }

    form.addEventListener('submit', (event) => {
      event.preventDefault();

      Swal.fire({
        title: 'Hapus semua notification?',
        text: 'Semua notification akan dihapus dan tidak dapat dikembalikan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus semua',
        cancelButtonText: 'Batal',
        reverseButtons: true,
      }).then((result) => {

        if (result.isConfirmed) {
          form.submit();
        }

      });

    });

  });
</script>

@endpush
