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
