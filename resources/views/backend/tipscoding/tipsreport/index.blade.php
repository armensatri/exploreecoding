@extends('backend.template.main')

@section('content-backend')
  <div class="content">
    <div class="p-4 mx-auto">
      <section class="w-full px-2 mb-2">
        <div class="content-backend">
          <div class="content-backend-title">
            {{ $title }}
          </div>
        </div>
      </section>

      <div class="alert">
        @if (session()->has('alert'))
          @include('sweetalert::alert')
        @endif
      </div>

      <section class="w-full px-3 mt-20">

        {{-- ================================================= --}}
        {{-- FILTER --}}
        {{-- ================================================= --}}

        <div class="flex flex-wrap items-center gap-2 mb-4">

        {{-- Semua --}}
        <a
          href="{{ route('tipsreports.index') }}"
          class="inline-flex items-center gap-2
            rounded-lg
            px-3 py-2
            text-sm font-medium
            transition

            {{ ! $status
              ? 'bg-slate-800 text-white'
              : 'bg-slate-100 text-slate-600 hover:bg-slate-200'
            }}"
        >
        <i class="bi bi-list"></i>

        Semua

        <span
          class="rounded-full
            px-2 py-0.5
            text-xs

            {{ ! $status
              ? 'bg-white/20 text-white'
              : 'bg-slate-200 text-slate-600'
            }}"
        >
          {{ $totalReports }}
        </span>
        </a>


        {{-- Pending --}}
        <a
          href="{{ route('tipsreports.index', ['status' => 'pending']) }}"
          class="inline-flex items-center gap-2
            rounded-lg
            px-3 py-2
            text-sm font-medium
            transition

            {{ $status === 'pending'
              ? 'bg-amber-500 text-white'
              : 'bg-slate-100 text-slate-600 hover:bg-slate-200'
            }}"
        >
        <i class="bi bi-clock"></i>

        Pending

        <span
          class="rounded-full
            px-2 py-0.5
            text-xs

            {{ $status === 'pending'
              ? 'bg-white/20 text-white'
              : 'bg-slate-200 text-slate-600'
            }}"
        >
          {{ $pendingReports }}
        </span>
        </a>


        {{-- Resolved --}}
        <a
          href="{{ route('tipsreports.index', ['status' => 'resolved']) }}"
          class="inline-flex items-center gap-2
            rounded-lg
            px-3 py-2
            text-sm font-medium
            transition

            {{ $status === 'resolved'
              ? 'bg-emerald-600 text-white'
              : 'bg-slate-100 text-slate-600 hover:bg-slate-200'
            }}"
        >
        <i class="bi bi-check-circle"></i>

        Resolved

        <span
          class="rounded-full
            px-2 py-0.5
            text-xs

            {{ $status === 'resolved'
              ? 'bg-white/20 text-white'
              : 'bg-slate-200 text-slate-600'
            }}"
        >
          {{ $resolvedReports }}
        </span>
        </a>


        {{-- Rejected --}}
        <a
          href="{{ route('tipsreports.index', ['status' => 'rejected']) }}"
          class="inline-flex items-center gap-2
            rounded-lg
            px-3 py-2
            text-sm font-medium
            transition

            {{ $status === 'rejected'
              ? 'bg-red-600 text-white'
              : 'bg-slate-100 text-slate-600 hover:bg-slate-200'
            }}"
        >
        <i class="bi bi-x-circle"></i>

        Rejected

        <span
          class="rounded-full
            px-2 py-0.5
            text-xs

            {{ $status === 'rejected'
              ? 'bg-white/20 text-white'
              : 'bg-slate-200 text-slate-600'
            }}"
        >
          {{ $rejectedReports }}
        </span>
        </a>

        </div>


        {{-- ================================================= --}}
        {{-- TABLE --}}
        {{-- ================================================= --}}

        <div
          class="overflow-x-auto bg-white border rounded-2xl border-slate-200"
          >
          <table class="w-full text-sm text-left">

            <thead class="bg-slate-50">
              <tr>

                <th
                  class="px-4 py-3 text-xs font-semibold tracking-wide uppercase whitespace-nowrap text-slate-500"
                >
                  #
                </th>

                <th
                  class="px-4 py-3 text-xs font-semibold tracking-wide uppercase whitespace-nowrap text-slate-500"
                >
                  TipsCoding
                </th>

                <th
                  class="px-4 py-3 text-xs font-semibold tracking-wide uppercase whitespace-nowrap text-slate-500"
                >
                  Reporter
                </th>

                <th
                  class="px-4 py-3 text-xs font-semibold tracking-wide uppercase text-slate-500"
                >
                  Comment
                </th>

                <th
                  class="px-4 py-3 text-xs font-semibold tracking-wide uppercase whitespace-nowrap text-slate-500"
                >
                  Reason
                </th>

                <th
                  class="px-4 py-3 text-xs font-semibold tracking-wide uppercase whitespace-nowrap text-slate-500"
                >
                  Status
                </th>

                <th
                  class="px-4 py-3 text-xs font-semibold tracking-wide uppercase whitespace-nowrap text-slate-500"
                >
                  Handled By
                </th>

                <th
                  class="px-4 py-3 text-xs font-semibold tracking-wide uppercase whitespace-nowrap text-slate-500"
                >
                  Action
                </th>

              </tr>
            </thead>


            <tbody class="divide-y divide-slate-100">

              @forelse ($reports as $report)

                <tr class="transition hover:bg-slate-50">

                  {{-- No --}}
                  <td class="px-4 py-4 align-top text-slate-400">
                    {{ $reports->firstItem() + $loop->index }}
                  </td>


                  {{-- TipsCoding --}}
                  <td class="px-4 py-4 align-top">

                    @if ($report->comment?->tipscoding)

                      <div
                        class="max-w-xs font-medium leading-5 text-slate-800"
                      >
                        {{ $report->comment->tipscoding->title }}
                      </div>

                      <div
                        class="mt-1 text-xs text-slate-400"
                      >
                        /{{ $report->comment->tipscoding->slug }}
                      </div>

                    @else

                      <span class="text-slate-400">
                        --
                      </span>

                    @endif

                  </td>


                  {{-- Reporter --}}
                  <td class="px-4 py-4 align-top">

                    <div
                      class="font-medium leading-5 text-slate-800"
                    >
                      {{ $report->user?->name ?? '--' }}
                    </div>

                    @if ($report->user?->username)

                      <div
                        class="mt-1 text-xs text-slate-400"
                      >
                        <span>@</span>{{ $report->user->username }}
                      </div>

                    @endif

                  </td>


                  {{-- Comment --}}
                  <td class="px-4 py-4 align-top">

                    <div
                      class="max-w-md leading-5 line-clamp-2 text-slate-600"
                    >
                      {{ $report->comment?->comment ?? '--' }}
                    </div>

                  </td>


                  {{-- Reason --}}
                  <td class="px-4 py-4 align-top">

                    <span
                      class="inline-flex px-2 py-1 text-xs font-medium capitalize rounded-md bg-slate-100 text-slate-600"
                    >
                      {{ $report->reason ?? '--' }}
                    </span>

                  </td>


                  {{-- Status --}}
                  <td class="px-4 py-4 align-top">

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
                        <i class="bi bi-clock"></i>
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
                        <i class="bi bi-check-circle"></i>
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
                        <i class="bi bi-x-circle"></i>
                        Rejected
                      </span>

                    @else

                      <span
                        class="inline-flex
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

                  </td>


                  {{-- Handled By --}}
                  <td class="px-4 py-4 align-top">

                    @if ($report->reviewer)

                      <div
                        class="font-medium leading-5 text-slate-800"
                      >
                        {{ $report->reviewer->name }}
                      </div>

                      @if ($report->reviewer->username)

                        <div
                          class="mt-1 text-xs text-slate-400"
                        >
                          <span>@</span>{{ $report->reviewer->username }}
                        </div>

                      @endif

                      @if ($report->reviewed_at)

                        <div
                          class="mt-1 text-xs text-slate-400"
                        >
                          {{ $report->reviewed_at->format('d M Y H:i') }}
                        </div>

                      @endif

                    @else

                      <span
                        class="text-xs text-slate-400"
                      >
                        Belum ditangani
                      </span>

                    @endif

                  </td>


                  {{-- Action --}}
                  <td class="px-4 py-4 align-top">

                    <a
                      href="{{ route('tipsreports.show', $report->id) }}"
                      class="inline-flex items-center gap-1.5
                        rounded-lg
                        border border-slate-200
                        bg-white
                        px-3 py-2
                        text-xs
                        font-medium
                        text-slate-600
                        transition
                        hover:border-sky-200
                        hover:bg-sky-50
                        hover:text-sky-600"
                    >
                      <i class="bi bi-eye"></i>
                      Detail
                    </a>

                  </td>

                </tr>


              @empty

                <tr>

                  <td
                    colspan="8"
                    class="px-4 py-12 text-center"
                  >
                    <div
                      class="flex items-center justify-center w-12 h-12 mx-auto rounded-full bg-slate-100 text-slate-400"
                    >
                      <i class="text-xl bi bi-flag"></i>
                    </div>

                    <div
                      class="mt-3 text-sm font-medium text-slate-600"
                    >
                      Belum ada report komentar.
                    </div>

                    <div
                      class="mt-1 text-xs text-slate-400"
                    >
                      Report komentar akan muncul di sini.
                    </div>
                  </td>

                </tr>

              @endforelse

            </tbody>

          </table>
        </div>


        {{-- ================================================= --}}
        {{-- PAGINATION --}}
        {{-- ================================================= --}}

        @if ($reports->lastPage() > 1)

          <div class="mt-4">
            <x-paginate :pagination="$reports" />
          </div>

        @endif

      </section>
    </div>
  </div>
@endsection
