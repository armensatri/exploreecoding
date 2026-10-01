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
