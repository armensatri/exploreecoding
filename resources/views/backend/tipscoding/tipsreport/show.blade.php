@extends('backend.template.main')

@section('content-backend')

  <div class="content">
    <div class="mx-auto p-4">

  {{-- ================================================= --}}
  {{-- TITLE --}}
  {{-- ================================================= --}}

  <section class="mb-4 w-full px-2">
    <div class="content-backend">
      <div class="content-backend-title">
        {{ $title }}
      </div>
    </div>
  </section>


  {{-- ================================================= --}}
  {{-- CONTENT --}}
  {{-- ================================================= --}}

  <section class="w-full px-3">

    <div
      class="overflow-hidden
        rounded-xl
        border border-slate-200
        bg-white"
    >

      {{-- ================================================= --}}
      {{-- TIPSCODING --}}
      {{-- ================================================= --}}

      <div
        class="border-b
          border-slate-200
          px-5 py-5"
      >

        <div
          class="mb-1
            text-xs
            font-semibold
            uppercase
            tracking-wide
            text-slate-400"
        >
          TipsCoding
        </div>

        <div
          class="text-base
            font-semibold
            leading-6
            text-slate-800"
        >
          {{ $report->comment?->tipscoding?->title ?? '--' }}
        </div>

        @if ($report->comment?->tipscoding?->slug)

          <div
            class="mt-1
              text-xs
              text-slate-400"
          >
            /{{ $report->comment->tipscoding->slug }}
          </div>

        @endif

      </div>


      {{-- ================================================= --}}
      {{-- REPORT INFORMATION --}}
      {{-- ================================================= --}}

      <div
        class="grid
          gap-x-8
          gap-y-5
          border-b
          border-slate-200
          px-5 py-5
          md:grid-cols-2"
      >

        {{-- Reported by --}}
        <div>

          <div
            class="mb-1
              text-xs
              font-semibold
              uppercase
              tracking-wide
              text-slate-400"
          >
            Reported by
          </div>

          <div
            class="text-sm
              font-medium
              text-slate-800"
          >
            {{ $report->user?->name ?? '--' }}

            @if ($report->user?->username)

              <span
                class="ml-1
                  font-normal
                  text-slate-400"
              >
                <span>@</span>{{ $report->user->username }}
              </span>

            @endif

          </div>

        </div>


        {{-- Reported at --}}
        <div>

          <div
            class="mb-1
              text-xs
              font-semibold
              uppercase
              tracking-wide
              text-slate-400"
          >
            Reported at
          </div>

          <div class="text-sm text-slate-800">
            {{ $report->created_at?->format('d M Y H:i') ?? '--' }}
          </div>

        </div>


        {{-- Comment owner --}}
        <div>

          <div
            class="mb-1
              text-xs
              font-semibold
              uppercase
              tracking-wide
              text-slate-400"
          >
            Comment milik
          </div>

          <div
            class="text-sm
              font-medium
              text-slate-800"
          >
            {{ $report->comment?->user?->name ?? '--' }}

            @if ($report->comment?->user?->username)

              <span
                class="ml-1
                  font-normal
                  text-slate-400"
              >
                <span>@</span>{{ $report->comment->user->username }}
              </span>

            @endif

          </div>

        </div>


        {{-- Comment created at --}}
        <div>

          <div
            class="mb-1
              text-xs
              font-semibold
              uppercase
              tracking-wide
              text-slate-400"
          >
            Comment created at
          </div>

          <div class="text-sm text-slate-800">
            {{ $report->comment?->created_at?->format('d M Y H:i') ?? '--' }}
          </div>

        </div>

      </div>


      {{-- ================================================= --}}
      {{-- REPORTED COMMENT --}}
      {{-- ================================================= --}}

      <div
        class="border-b
          border-slate-200
          px-5 py-5"
      >

        <div
          class="mb-2
            text-xs
            font-semibold
            uppercase
            tracking-wide
            text-slate-400"
        >
          Reported comment
        </div>

        <div
          class="rounded-xl
            border
            border-slate-200
            bg-slate-50
            p-4
            text-sm
            leading-6
            text-slate-700"
        >
          {{ $report->comment?->comment ?? '--' }}
        </div>


        {{-- Comment status --}}
        <div class="mt-4">

          <div
            class="mb-1
              text-xs
              font-semibold
              uppercase
              tracking-wide
              text-slate-400"
          >
            Comment status
          </div>


          @if ($report->comment?->status === 'approved')

            <div class="flex flex-wrap items-center gap-2">

              <span
                class="inline-flex items-center gap-1.5
                  rounded-full
                  bg-emerald-100
                  px-2.5 py-1
                  text-xs
                  font-medium
                  text-emerald-700"
              >
                <span
                  class="h-1.5 w-1.5
                    rounded-full
                    bg-emerald-500"
                ></span>

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
                  rounded-full
                  bg-slate-100
                  px-2.5 py-1
                  text-xs
                  font-medium
                  text-slate-600"
              >
                <span
                  class="h-1.5 w-1.5
                    rounded-full
                    bg-slate-500"
                ></span>

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
                rounded-full
                bg-slate-100
                px-2.5 py-1
                text-xs
                font-medium
                text-slate-600"
            >
              {{ $report->comment?->status ?? '--' }}
            </span>

          @endif

        </div>

      </div>


      {{-- ================================================= --}}
      {{-- REPORT DETAILS --}}
      {{-- ================================================= --}}

      <div
        class="grid
          gap-x-8
          gap-y-5
          border-b
          border-slate-200
          px-5 py-5
          md:grid-cols-2"
      >

        {{-- Reason --}}
        <div>

          <div
            class="mb-1
              text-xs
              font-semibold
              uppercase
              tracking-wide
              text-slate-400"
          >
            Reason
          </div>

          <div
            class="text-sm
              capitalize
              text-slate-800"
          >
            {{ $report->reason ?? '--' }}
          </div>

        </div>


        {{-- Report status --}}
        <div>

          <div
            class="mb-1
              text-xs
              font-semibold
              uppercase
              tracking-wide
              text-slate-400"
          >
            Report status
          </div>


          @if ($report->status === 'pending')

            <span
              class="inline-flex items-center gap-1.5
                rounded-full
                bg-amber-100
                px-2.5 py-1
                text-xs
                font-medium
                text-amber-700"
            >
              <span
                class="h-1.5 w-1.5
                  rounded-full
                  bg-amber-500"
              ></span>

              Pending
            </span>


          @elseif ($report->status === 'resolved')

            <span
              class="inline-flex items-center gap-1.5
                rounded-full
                bg-emerald-100
                px-2.5 py-1
                text-xs
                font-medium
                text-emerald-700"
            >
              <span
                class="h-1.5 w-1.5
                  rounded-full
                  bg-emerald-500"
              ></span>

              Resolved
            </span>


          @elseif ($report->status === 'rejected')

            <span
              class="inline-flex items-center gap-1.5
                rounded-full
                bg-red-100
                px-2.5 py-1
                text-xs
                font-medium
                text-red-700"
            >
              <span
                class="h-1.5 w-1.5
                  rounded-full
                  bg-red-500"
              ></span>

              Rejected
            </span>


          @else

            <span
              class="inline-flex items-center
                rounded-full
                bg-slate-100
                px-2.5 py-1
                text-xs
                font-medium
                text-slate-600"
            >
              {{ $report->status ?? '--' }}
            </span>

          @endif

        </div>


        {{-- Description --}}
        <div class="md:col-span-2">

          <div
            class="mb-1
              text-xs
              font-semibold
              uppercase
              tracking-wide
              text-slate-400"
          >
            Description
          </div>

          <div
            class="whitespace-pre-line
              text-sm
              leading-6
              text-slate-700"
          >
            {{ $report->description ?: '--' }}
          </div>

        </div>

      </div>


      {{-- ================================================= --}}
      {{-- HANDLED BY --}}
      {{-- ================================================= --}}

      <div
        class="border-b
          border-slate-200
          px-5 py-5"
      >

        <div
          class="mb-1
            text-xs
            font-semibold
            uppercase
            tracking-wide
            text-slate-400"
        >
          Handled by
        </div>


        @if ($report->reviewer)

          <div
            class="text-sm
              font-medium
              text-slate-800"
          >
            {{ $report->reviewer->name }}

            @if ($report->reviewer->username)

              <span
                class="ml-1
                  font-normal
                  text-slate-400"
              >
                <span>@</span>{{ $report->reviewer->username }}
              </span>

            @endif

          </div>


          @if ($report->reviewed_at)

            <div
              class="mt-1
                text-xs
                text-slate-400"
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


      {{-- ================================================= --}}
      {{-- ACTION --}}
      {{-- ================================================= --}}

      <div
        class="flex flex-wrap
          items-center
          gap-2
          px-5 py-4"
      >

        @if ($report->status === 'pending')

          {{-- Resolve --}}
          <form
            action="{{ route('tipsreports.resolve', $report->id) }}"
            method="POST"
            data-report-action="resolve"
          >

            @csrf
            @method('PATCH')

            <button
              type="submit"
              class="inline-flex items-center gap-2
                rounded-lg
                bg-emerald-600
                px-4 py-2
                text-sm
                font-medium
                text-white
                transition
                hover:bg-emerald-700"
            >
              <i class="bi bi-check-circle"></i>
              Resolve
            </button>

          </form>


          {{-- Reject --}}
          <form
            action="{{ route('tipsreports.reject', $report->id) }}"
            method="POST"
            data-report-action="reject"
          >

            @csrf
            @method('PATCH')

            <button
              type="submit"
              class="inline-flex items-center gap-2
                rounded-lg
                bg-red-600
                px-4 py-2
                text-sm
                font-medium
                text-white
                transition
                hover:bg-red-700"
            >
              <i class="bi bi-x-circle"></i>
              Reject
            </button>

          </form>

        @endif


        {{-- Back --}}
        <a
          href="{{ route('tipsreports.index') }}"
          class="inline-flex items-center gap-2
            rounded-lg
            bg-slate-100
            px-4 py-2
            text-sm
            font-medium
            text-slate-700
            transition
            hover:bg-slate-200"
        >
          <i class="bi bi-arrow-left"></i>
          Kembali
        </a>

      </div>

    </div>

  </section>

</div>

  </div>

{{-- ================================================= --}}
{{-- SWEETALERT --}}
{{-- ================================================= --}}

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
