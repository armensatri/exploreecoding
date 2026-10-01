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
