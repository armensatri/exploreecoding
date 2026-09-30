<div
  class="flex flex-col items-center justify-center gap-4 md:flex-row">
  <a href="{{ route('monitoring.tipsreports-index') }}">
    <div
      class="pl-2 pr-1.5 shadow-xs py-1.25 text-[15px] bg-slate-300 text-slate-800 border-slate-500
      rounded-[11px] font-medium border tracking-wide">
      <i class="bi bi-list"></i>
      Semua reports
      <span
        class="px-1.5 py-0.5 text-xs text-slate-800 bg-white
        rounded-[7px]
        font-sans border border-slate-500">
        {{ $totalReports }}
      </span>
    </div>
  </a>

  <a href="{{ route('monitoring.tipsreports-index', [
    'status' => 'pending']) }}">
    <div
      class="pl-2 pr-1.5 shadow-xs  py-1.25 text-[15px] text-amber-800 hover:bg-amber-200 rounded-[11px] font-medium border border-amber-500 tracking-wide bg-amber-100
      {{ $status === 'pending' ? 'bg-amber-300' : 'bg-amber-100' }}">
      <i class="bi bi-clock"></i>
      Pending
      <span
        class="px-1.5 py-0.5 text-xs text-slate-800 bg-white
        rounded-[7px] font-sans border border-amber-500">
        {{ $pendingReports }}
      </span>
    </div>
  </a>

  <a href="{{ route('monitoring.tipsreports-index', [
    'status' => 'resolved']) }}">
    <div
      class="pl-2 pr-1.5 shadow-xs py-1.25 text-[15px]
      bg-emerald-100 text-emerald-800 hover:bg-emerald-200
      rounded-[11px] font-medium border border-emerald-500
      tracking-wide {{ $status === 'resolved' ? 'bg-emerald-300' :
      'bg-emerald-100' }}">
      <i class="bi bi-check-circle"></i>
      Resolved
      <span
        class="px-1.5 py-0.5 text-xs text-slate-800 bg-white
        rounded-[7px]
        font-sans border border-emerald-500">
        {{ $resolvedReports }}
      </span>
    </div>
  </a>

  <a href="{{ route('monitoring.tipsreports-index', [
    'status' => 'rejected']) }}">
    <div
      class="pl-2 pr-1.5 shadow-xs py-1.25 text-[15px] bg-red-100 text-red-800 hover:bg-red-200
      rounded-[11px] font-medium border border-red-500 tracking-wide
      {{ $status === 'rejected' ? 'bg-red-300' :
      'bg-red-100' }}">
      <i class="bi bi-x-circle"></i>
      Rejected
      <span
        class="px-1.5 py-0.5 text-xs text-slate-800 bg-white
        rounded-[7px] font-sans border border-red-500">
        {{ $rejectedReports }}
      </span>
    </div>
  </a>
</div>
