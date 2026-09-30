@extends('backend.template.main')

@section('content-backend')
  <div class="content">
    <div class="p-4 mx-auto">
      <section class="w-full px-2 mb-4">
        <div class="content-backend">
          <div class="content-backend-title">
            {{ $title }}
          </div>
        </div>
      </section>

      <section class="w-full px-3">
        <div
          class="overflow-hidden bg-white border rounded-xl border-slate-200">
          {{-- tipscoding --}}
          <div class="px-5 py-5 border-b border-slate-200">
            <div
              class="mb-1 text-xs font-semibold tracking-wide uppercase text-slate-400">
              TipsCoding
            </div>

            <div
              class="text-base font-semibold leading-6 text-slate-800">
              {{ $report->comment?->tipscoding?->title ?? '--' }}
            </div>

            @if ($report->comment?->tipscoding?->slug)
              <div class="mt-1 text-xs text-slate-400">
                /{{ $report->comment->tipscoding->slug }}
              </div>
            @endif
          </div>

          {{-- report information --}}
          <div
            class="grid px-5 py-5 border-b gap-x-8 gap-y-5 border-slate-200 md:grid-cols-2">
            <div>
              <div
                class="mb-1 text-xs font-semibold tracking-wide uppercase text-slate-400">
                Reported by
              </div>

              <div class="text-sm font-medium text-slate-800">
                {{ $report->user?->name ?? '--' }}

                @if ($report->user?->username)
                  <span class="ml-1 font-normal text-slate-400">
                    <span>@</span>{{ $report->user->username }}
                  </span>
                @endif
              </div>
            </div>


            <div>
              <div
                class="mb-1 text-xs font-semibold tracking-wide uppercase text-slate-400">
                Reported at
              </div>

              <div class="text-sm text-slate-800">
                {{ $report->created_at?->format('d M Y H:i') ?? '--' }}
              </div>
            </div>


            <div>
              <div
                class="mb-1 text-xs font-semibold tracking-wide uppercase text-slate-400">
                Comment milik
              </div>

              <div
                class="text-sm font-medium text-slate-800">
                {{ $report->comment?->user?->name ?? '--' }}

                @if ($report->comment?->user?->username)
                  <span class="ml-1 font-normal text-slate-400">
                    <span>@</span>{{ $report->comment->user->username }}
                  </span>
                @endif
              </div>
            </div>


            <div>
              <div
                class="mb-1 text-xs font-semibold tracking-wide uppercase text-slate-400">
                Comment created at
              </div>

              <div class="text-sm text-slate-800">
                {{ $report->comment?->created_at?->format('d M Y H:i') ?? '--' }}
              </div>
            </div>
          </div>

          {{-- report comment --}}
          <div class="px-5 py-5 border-b border-slate-200">
            <div
              class="mb-2 text-xs font-semibold tracking-wide uppercase text-slate-400">
              Reported comment
            </div>

            <div
              class="p-4 text-sm leading-6 border rounded-xl border-slate-200 bg-slate-50 text-slate-700">
              {{ $report->comment?->comment ?? '--' }}
            </div>


            <div class="mt-4">
              <div
                class="mb-1 text-xs font-semibold tracking-wide uppercase text-slate-400">
                Comment status
              </div>


              @if ($report->comment?->status === 'approved')
                <div class="flex flex-wrap items-center gap-2">
                  <span
                    class="inline-flex items-center gap-1.5
                    rounded-full bg-emerald-100 px-2.5 py-1 text-xs
                    font-medium text-emerald-700">
                    <span
                      class="h-1.5 w-1.5 rounded-full
                      bg-emerald-500">
                    </span>
                    Approved
                  </span>

                  @if ($report->status === 'rejected')
                    <span class="text-xs text-slate-400">
                      Komentar tetap ditampilkan
                    </span>
                  @endif
                </div>


              @elseif ($report->comment?->status === 'hidden')
                <div class="flex flex-wrap items-center gap-2">
                  <span
                    class="inline-flex items-center gap-1.5
                    rounded-full bg-slate-100 px-2.5 py-1
                    text-xs font-medium text-slate-600">
                    <span
                      class="h-1.5 w-1.5 rounded-full bg-slate-500">
                    </span>
                    Hidden
                  </span>

                  @if ($report->status === 'resolved')
                    <span class="text-xs text-slate-400">
                      Komentar disembunyikan setelah report ditindaklanjuti
                    </span>
                  @endif
                </div>
              @else
                <span
                  class="inline-flex items-center
                  rounded-full bg-slate-100 px-2.5 py-1
                  text-xs font-medium text-slate-600">
                  {{ $report->comment?->status ?? '--' }}
                </span>
              @endif
            </div>
          </div>

          {{-- report detail --}}
          <div
            class="grid px-5 py-5 border-b gap-x-8 gap-y-5 border-slate-200 md:grid-cols-2">
            <div>
              <div
                class="mb-1 text-xs font-semibold tracking-wide uppercase text-slate-400">
                Reason
              </div>

              <div class="text-sm capitalize text-slate-800">
                {{ $report->reason ?? '--' }}
              </div>
            </div>

            <div>
              <div
                class="mb-1 text-xs font-semibold tracking-wide uppercase text-slate-400">
                Report status
              </div>

              @if ($report->status === 'pending')
                <span
                  class="inline-flex items-center gap-1.5
                  rounded-full bg-amber-100 px-2.5 py-1 text-xs
                  font-mediumtext-amber-700">
                  <span
                    class="h-1.5 w-1.5 rounded-full bg-amber-500">
                  </span>
                  Pending
                </span>
              @elseif ($report->status === 'resolved')
                <span
                  class="inline-flex items-center gap-1.5
                  rounded-full bg-emerald-100 px-2.5 py-1 text-xs
                  font-mediumtext-emerald-700">
                  <span
                    class="h-1.5 w-1.5 rounded-full bg-emerald-500">
                  </span>
                  Resolved
                </span>


              @elseif ($report->status === 'rejected')
                <span
                  class="inline-flex items-center gap-1.5
                  rounded-full bg-red-100 px-2.5 py-1 text-xs
                  font-medium text-red-700">
                  <span
                    class="h-1.5 w-1.5 rounded-full bg-red-500">
                  </span>
                  Rejected
                </span>
              @else
                <span
                  class="inline-flex items-centerrounded-full
                  bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600">
                  {{ $report->status ?? '--' }}
                </span>
              @endif
            </div>

            <div class="md:col-span-2">
              <div
                class="mb-1 text-xs font-semibold tracking-wide uppercase text-slate-400">
                Description
              </div>

              <div
                class="text-sm leading-6 whitespace-pre-line text-slate-700">
                {{ $report->description ?: '--' }}
              </div>
            </div>
          </div>

          {{-- handle by  ini lagi ya --}}
          <div
            class="px-5 py-5 border-b border-slate-200"
            >

            <div
              class="mb-1 text-xs font-semibold tracking-wide uppercase text-slate-400"
            >
              Handled by
            </div>


            @if ($report->reviewer)

              <div
                class="text-sm font-medium text-slate-800"
              >
                {{ $report->reviewer->name }}

                @if ($report->reviewer->username)

                  <span
                    class="ml-1 font-normal text-slate-400"
                  >
                    <span>@</span>{{ $report->reviewer->username }}
                  </span>

                @endif

              </div>


              @if ($report->reviewed_at)

                <div
                  class="mt-1 text-xs text-slate-400"
                >
                  {{ $report->reviewed_at->format('d M Y H:i') }}
                </div>

              @endif


            @else

              <div class="text-sm text-slate-400">
                Belum ditangani
              </div>

            @endif

          </div>

          {{-- action --}}
          <div
            class="flex flex-wrap items-center gap-2 px-5 py-4"
            >

            @if ($report->status === 'pending')

              {{-- Resolve --}}
              <form
                action="{{ route('monitoring.tipsreports-resolve', $report->id) }}"
                method="POST"
                data-report-action="resolve"
              >

                @csrf
                @method('PATCH')

                <button
                  type="submit"
                  class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition rounded-lg bg-emerald-600 hover:bg-emerald-700"
                >
                  <i class="bi bi-check-circle"></i>
                  Resolve
                </button>

              </form>


              {{-- Reject --}}
              <form
                action="{{ route('monitoring.tipsreports-reject', $report->id) }}"
                method="POST"
                data-report-action="reject"
              >

                @csrf
                @method('PATCH')

                <button
                  type="submit"
                  class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition bg-red-600 rounded-lg hover:bg-red-700"
                >
                  <i class="bi bi-x-circle"></i>
                  Reject
                </button>

              </form>

            @endif


            {{-- Back --}}
            <a
              href="{{ route('monitoring.tipsreports-index') }}"
              class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium transition rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200"
            >
              <i class="bi bi-arrow-left"></i>
              Kembali
            </a>

          </div>
        </div>
      </section>
    </div>
  </div>

  <script>
    document.addEventListener('submit', (event) => {

      const form = event.target.closest(
        '[data-report-action]'
      );

      if (!form) {
        return;
      }

      event.preventDefault();

      const action =
        form.dataset.reportAction;

      const isResolve =
        action === 'resolve';


      Swal.fire({

        title: isResolve
          ? 'Resolve report?'
          : 'Reject report?',

        text: isResolve
          ? 'Report ini akan ditandai sebagai resolved dan komentar akan disembunyikan.'
          : 'Report ini akan ditandai sebagai rejected dan komentar tetap ditampilkan.',

        icon: 'warning',

        showCancelButton: true,

        confirmButtonText: isResolve
          ? 'Ya, Resolve'
          : 'Ya, Reject',

        cancelButtonText: 'Batal',

        confirmButtonColor: isResolve
          ? '#059669'
          : '#dc2626',

        cancelButtonColor: '#64748b',

        reverseButtons: true,

      }).then((result) => {

        if (result.isConfirmed) {
          form.submit();
        }

      });

    });
  </script>
@endsection
