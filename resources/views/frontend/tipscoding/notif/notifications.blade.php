@extends('frontend.template.main')

@section('content-frontend')

  <div class="max-w-3xl px-4 pt-24 pb-8 mx-auto">

    {{-- ================================================= --}}
    {{-- ALERT --}}
    {{-- ================================================= --}}

    <div class="alert">

      @if (session()->has('alert'))

        @include('sweetalert::alert')

      @endif

    </div>


    {{-- ================================================= --}}
    {{-- HEADER --}}
    {{-- ================================================= --}}

    <div class="mb-6">

      <div
        class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between"
      >

        {{-- ================================================= --}}
        {{-- TITLE --}}
        {{-- ================================================= --}}

        <div>

          <h1
            class="text-2xl font-bold tracking-tight text-slate-800"
          >
            Notifications
          </h1>

          <p
            class="mt-1 text-sm text-slate-500"
          >
            Semua aktivitas terbaru yang berkaitan dengan akun kamu.
          </p>

        </div>


        {{-- ================================================= --}}
        {{-- ACTIONS --}}
        {{-- ================================================= --}}

        <div
          class="flex items-center justify-end gap-2 shrink-0"
        >

          {{-- ================================================= --}}
          {{-- MARK ALL AS READ --}}
          {{-- ================================================= --}}

          @if ($unreadCount > 0)

            <form
              action="{{ route('notifications.read-all') }}"
              method="POST"
            >

              @csrf
              @method('PATCH')

              <button
                type="submit"
                title="Tandai semua sudah dibaca"
                class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium transition bg-white border rounded-lg cursor-pointer text-slate-600 border-slate-200 hover:bg-slate-50"
              >

                <i class="bi bi-check2-all"></i>

                <span class="hidden sm:inline">
                  Tandai semua sudah dibaca
                </span>

              </button>

            </form>

          @endif


          {{-- ================================================= --}}
          {{-- DELETE ALL --}}
          {{-- ================================================= --}}

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
                title="Hapus semua notification"
                class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium text-red-600 transition bg-white border border-red-200 rounded-lg cursor-pointer hover:bg-red-50"
              >

                <i class="bi bi-trash3"></i>

                <span class="hidden sm:inline">
                  Hapus semua
                </span>

              </button>

            </form>

          @endif

        </div>

      </div>


      {{-- ================================================= --}}
      {{-- UNREAD COUNT --}}
      {{-- ================================================= --}}

      @if ($unreadCount > 0)

        <div class="mt-4">

          <span
            class="inline-flex items-center
              px-3 py-1.5
              text-xs
              font-semibold
              text-sky-600
              bg-sky-50
              rounded-full
              border border-sky-100"
          >
            {{ $unreadCount }} belum dibaca
          </span>

        </div>

      @endif

    </div>


    {{-- ================================================= --}}
    {{-- NOTIFICATION LIST --}}
    {{-- ================================================= --}}

    <div class="space-y-3">

      @forelse ($notifications as $notification)

        @php

          $type = $notification->data['type'] ?? null;

          $reaction = $notification->data['reaction'] ?? null;

          $icon = match ($type) {

            'tipscoding.comment.reaction' => match ($reaction) {

              'like' => 'bi-hand-thumbs-up-fill',

              'dislike' => 'bi-hand-thumbs-down-fill',

              default => 'bi-heart-fill',

            },


            'tipscoding.comment.reply'
              => 'bi-reply-fill',


            'tipscoding.comment.pinned'
              => 'bi-pin-angle-fill',


            'tipscoding.comment'
              => 'bi-chat-fill',


            'tipscoding.comment.report'
              => 'bi-flag-fill',


            'tipscoding.comment.report.result'
              => match ($notification->data['status'] ?? null) {

                'resolved'
                  => 'bi-check-circle-fill',

                'rejected'
                  => 'bi-x-circle-fill',

                default
                  => 'bi-flag-fill',

              },


            default
              => 'bi-bell-fill',

          };

        @endphp


        {{-- ================================================= --}}
        {{-- NOTIFICATION ITEM --}}
        {{-- ================================================= --}}

        <div
          class="group relative
            flex gap-4
            p-4
            border border-slate-200
            rounded-xl
            transition

            {{ is_null($notification->read_at)
              ? 'bg-sky-50/60 border-sky-100'
              : 'bg-white' }}"
        >


          {{-- ================================================= --}}
          {{-- ICON --}}
          {{-- ================================================= --}}

          <div class="shrink-0">

            <div
              class="flex items-center justify-center
                w-10 h-10
                rounded-full

                {{ is_null($notification->read_at)
                  ? 'bg-sky-100 text-sky-600'
                  : 'bg-slate-100 text-slate-600' }}"
            >

              <i class="bi {{ $icon }}"></i>

            </div>

          </div>


          {{-- ================================================= --}}
          {{-- CONTENT --}}
          {{-- ================================================= --}}

          <div
            class="flex-1 min-w-0 pr-10"
          >

            <a
              href="{{ route('notifications.read', $notification->id) }}"
              class="block"
            >

              {{-- ================================================= --}}
              {{-- MESSAGE --}}
              {{-- ================================================= --}}

              <div
                class="flex items-start gap-2"
              >

                <div
                  class="font-medium leading-5 text-slate-800"
                >

                  {{ \App\Support\TipscodingNotification::message($notification) }}

                </div>


                {{-- ================================================= --}}
                {{-- UNREAD DOT --}}
                {{-- ================================================= --}}

                @if (is_null($notification->read_at))

                  <span
                    class="w-2 h-2 mt-2 rounded-full shrink-0 bg-sky-500"
                  ></span>

                @endif

              </div>


              {{-- ================================================= --}}
              {{-- COMMENT PREVIEW --}}
              {{-- ================================================= --}}

              @if (!empty($notification->data['comment']))

                <p
                  class="mt-1 text-sm leading-5 text-slate-500 line-clamp-2"
                >
                  {{ $notification->data['comment'] }}
                </p>

              @endif


              {{-- ================================================= --}}
              {{-- TIME + STATUS --}}
              {{-- ================================================= --}}

              <div
                class="flex items-center gap-2 mt-2 text-xs text-slate-400"
              >

                <span>
                  {{ $notification->created_at->diffForHumans() }}
                </span>

                <span>
                  •
                </span>

                <span>
                  {{ is_null($notification->read_at)
                    ? 'Belum dibaca'
                    : 'Sudah dibaca' }}
                </span>

              </div>

            </a>

          </div>


          {{-- ================================================= --}}
          {{-- DELETE --}}
          {{-- ================================================= --}}

          <form
            action="{{ route('notifications.delete', $notification->id) }}"
            method="POST"
            class="absolute top-3 right-3"
              data-confirm-delete>

            @csrf
            @method('DELETE')

            <button
              type="submit"
              title="Hapus notification"
              class="flex items-center justify-center w-8 h-8 transition rounded-lg cursor-pointer text-slate-400 hover:text-red-500 hover:bg-red-50"
            >

              <i class="bi bi-trash3"></i>

            </button>

          </form>

        </div>


      @empty


        {{-- ================================================= --}}
        {{-- EMPTY --}}
        {{-- ================================================= --}}

        <div
          class="py-12 text-center"
        >

          <div
            class="flex items-center justify-center w-12 h-12 mx-auto rounded-full bg-slate-100"
          >

            <i
              class="text-2xl bi bi-bell-slash text-slate-300"
            ></i>

          </div>

          <p
            class="mt-3 text-sm text-slate-500"
          >
            Belum ada notification.
          </p>

        </div>

      @endforelse

    </div>


    {{-- ================================================= --}}
    {{-- PAGINATION --}}
    {{-- ================================================= --}}

    @if ($notifications->lastPage() > 1)

      <div class="grid mt-6 table-pagination">

        <x-paginate
          :pagination="$notifications"
        />

      </div>

    @endif

  </div>

@endsection


@push('scripts')

<script>
  document.addEventListener('DOMContentLoaded', () => {


    // =====================================================
    // DELETE ONE NOTIFICATION
    // =====================================================

    const deleteForms = document.querySelectorAll(
      '[data-confirm-delete]'
    );

    deleteForms.forEach((form) => {

      form.addEventListener('submit', (event) => {

        event.preventDefault();

        Swal.fire({
          title: 'Hapus notification?',
          text: 'Notification ini akan dihapus dan tidak dapat dikembalikan.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Ya, hapus',
          cancelButtonText: 'Batal',
          reverseButtons: true,
        }).then((result) => {

          if (result.isConfirmed) {
            form.submit();
          }

        });

      });

    });


    // =====================================================
    // DELETE ALL NOTIFICATIONS
    // =====================================================

    const deleteAllForm = document.querySelector(
      '[data-confirm-delete-all]'
    );

    if (!deleteAllForm) {
      return;
    }

    deleteAllForm.addEventListener('submit', (event) => {

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
          deleteAllForm.submit();
        }

      });

    });

  });
</script>

@endpush
