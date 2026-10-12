@extends('frontend.template.main')

@section('content-frontend')
  <div class="max-w-3xl px-4 pt-24 pb-8 mx-auto">
    <div class="alert">
      @if (session()->has('alert'))
        @include('sweetalert::alert')
      @endif
    </div>

    {{-- Header --}}
    <div class="mt-20 mb-6">
      <div
        class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
          <h1
            class="text-2xl font-bold tracking-wide uppercase text-slate-800">
            Notifications
          </h1>

          <p class="mt-1 text-[15px] font-medium text-slate-500">
            Semua aktivitas terbaru yang berkaitan dengan akun kamu.
          </p>
        </div>

        {{-- Action --}}
        <div class="flex items-center justify-end gap-2 shrink-0">
          {{-- Mark all as read --}}
          @if ($unreadCount > 0)
            <form action="{{ route('notifications.read-all') }}"
              method="POST">
              @method('PATCH')
              @csrf

              <button
                type="submit"
                title="Tandai semua sudah dibaca"
                class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium transition bg-white border rounded-lg cursor-pointer text-slate-600 border-slate-200 hover:bg-slate-50">
                <i class="bi bi-check2-all"></i>
                <span class="hidden sm:inline">
                  Tandai semua sudah dibaca
                </span>
              </button>
            </form>
          @endif

          {{-- Delete all --}}
          @if ($notifications->total() > 0)
            <form action="{{ route('notifications.delete-all') }}"
              method="POST"
              data-confirm-delete-all>
              @method('DELETE')
              @csrf

              <button
                type="submit"
                title="Hapus semua notification"
                class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium text-red-600 transition bg-white border border-red-200 rounded-[8px] cursor-pointer hover:bg-red-50">
                <i class="bi bi-trash3"></i>
                <span class="hidden sm:inline">
                  Hapus semua
                </span>
              </button>
            </form>
          @endif
        </div>
      </div>

      {{-- Unread count --}}
      @if ($unreadCount > 0)
        <div class="mt-4">
          <span
            class="inline-flex items-center px-3 py-1.5 text-[13px] font-medium text-red-600 bg-sky-50 rounded-full border border-sky-200 italic tracking-wide">
            {{ $unreadCount }} Notification belum dibaca
          </span>
        </div>
      @endif
    </div>

    {{-- Notifications list --}}
    <div class="space-y-3">
      @forelse ($notifications as $notification)
        @php
          $type = $notification->data['type'] ?? null;
          $reaction = $notification->data['reaction'] ?? null;
          $status = $notification->data['status'] ?? null;
        @endphp

        {{-- Notification item --}}
        <div
          class="group relative flex gap-4 p-4 border border-gray-200 rounded-2xl transition {{
            is_null($notification->read_at)
            ? 'bg-red-50 hover:bg-red-100 hover:border-red-300'
            : 'bg-white hover:bg-gray-50 hover:border-gray-300'
          }}">

          {{-- Icon --}}
          <div class="shrink-0">
            <div
              class="flex items-center justify-center w-10 h-10 border border-gray-300 rounded-full bg-slate-100">

              {{-- Reaction --}}
              @if ($type === 'tipscoding.comment.reaction')
                @if ($reaction === 'like')
                  <span
                    class="text-yellow-400 bi bi-hand-thumbs-up-fill">
                  </span>
                @elseif ($reaction === 'dislike')
                  <span
                    class="bi bi-hand-thumbs-down-fill">
                  </span>
                @else
                  <span
                    class="bi bi-heart-fill">
                  </span>
                @endif

              {{-- Reply --}}
              @elseif ($type === 'tipscoding.comment.reply')
                <span
                  class="text-blue-500 bi bi-reply-fill">
                </span>

              {{-- Pinned --}}
              @elseif ($type === 'tipscoding.comment.pinned')
                <span
                  class="text-blue-500 bi bi-pin-angle-fill">
                </span>

              {{-- Comment --}}
              @elseif ($type === 'tipscoding.comment')
                <span
                  class="text-green-400 bi bi-chat-fill">
                </span>

              {{-- Report --}}
              @elseif ($type === 'tipscoding.comment.report')
                <span
                  class="text-red-500 bi bi-flag-fill">
                </span>

              {{-- Report result --}}
              @elseif ($type === 'tipscoding.comment.report.result')
                @if ($status === 'resolved')
                  <span
                    class="text-green-500 bi bi-check-circle-fill">
                  </span>
                @elseif ($status === 'rejected')
                  <span
                    class="text-red-500 bi bi-x-circle-fill">
                  </span>
                @else
                  <span
                    class="bi bi-flag-fill">
                  </span>
                @endif

              {{-- Order --}}
              @else
                <span
                  class="bi bi-bell-fill text-slate-600">
                </span>
              @endif
            </div>
          </div>

          {{-- Content --}}
          <div class="flex-1 min-w-0 pr-10">
            <a
              href="{{ route('notifications.read', $notification->id) }}"
              class="block">

              {{-- Message --}}
              <div class="flex items-start gap-2 mt-0.5">
                <div
                  class="font-normal leading-5 tracking-wide text-slate-800">
                  {!!
                    \App\Support\TipscodingNotification::message($notification)
                  !!}
                </div>

                {{-- Unread dot --}}
                @if (is_null($notification->read_at))
                  <span
                    class="w-2 h-2 mt-2 bg-red-500 rounded-full shrink-0">
                  </span>
                @endif
              </div>

              {{-- Comment preview --}}
              @if (!empty($notification->data['comment']))
                <div
                  class="mt-1 text-[15px] leading-6 text-gray-600
                  tracking-wide">
                  <i class="mr-1 text-xs bi bi-chat-right-dots-fill">
                  </i>
                  {{ $notification->data['comment'] }}
                </div>
              @endif

              {{-- Time + status --}}
              <div
                class="flex items-center gap-2 mt-5 text-[13px] text-slate-500">
                <span>
                  {{ $notification->created_at->diffForHumans() }}
                </span>

                <span>
                  •
                </span>

                @if (is_null($notification->read_at))
                  <span class="italic tracking-wide text-red-600">
                    Belum di baca
                  </span>
                @else
                  <span class="italic tracking-wide text-green-600">
                    Sudah di baca
                  </span>
                @endif
              </div>
            </a>
          </div>

          {{-- Delete per notif --}}
          <form action="{{
            route('notifications.delete', $notification->id) }}"
            method="POST"
            class="absolute top-3 right-3"
            data-confirm-delete>
            @method('DELETE')
            @csrf

            <button
              type="submit"
              title="Hapus notification"
              class="flex items-center justify-center w-8 h-8
              transition border border-gray-300 rounded-[8px] cursor-pointer hover:bg-red-600 text-red-500
              hover:border-0 hover:shadow-xs hover:text-white">
              <i class="bi bi-trash3"></i>
            </button>
          </form>
        </div>
      @empty
        {{-- Empty --}}
        <div class="py-12 text-center">
          <div class="px-4 py-10 text-center">
            <div
              class="flex items-center justify-center w-12 h-12 mx-auto rounded-full bg-slate-100">
              <i class="text-5xl bi bi-bell-slash text-slate-400"></i>
            </div>

            <div
              class="mt-10 text-base font-semibold tracking-wider uppercase text-slate-900">
              Belum ada notification
            </div>

            <div
              class="mt-1 text-[15px] italic tracking-wide
              text-slate-500">
              Notification aktivitas kamu akan muncul di sini
            </div>
          </div>
        </div>
      @endforelse
    </div>

    {{-- Paginations --}}
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

      // Delete per notif
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

      // Delete all notif
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
