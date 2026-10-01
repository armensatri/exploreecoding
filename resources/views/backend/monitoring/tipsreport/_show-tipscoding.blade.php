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
