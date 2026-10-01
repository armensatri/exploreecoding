<div class="px-5 py-5 border-b border-slate-200">
  <div
    class="mb-1 text-xs font-semibold tracking-wide uppercase text-slate-400">
    Handled by
  </div>

  @if ($report->reviewer)
    <div class="text-sm font-medium text-slate-800">
      {{ $report->reviewer->name }}

      @if ($report->reviewer->username)
        <span class="ml-1 font-normal text-slate-400">
          <span>@</span>{{ $report->reviewer->username }}
        </span>
      @endif
    </div>

    @if ($report->reviewed_at)
      <div class="mt-1 text-xs text-slate-400">
        {{ $report->reviewed_at->format('d M Y H:i') }}
      </div>
    @endif
  @else
    <div class="text-sm text-slate-400">
      Belum ditangani
    </div>
  @endif
</div>
