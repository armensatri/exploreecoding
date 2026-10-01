<div class="flex flex-wrap items-center gap-2 px-5 py-4">
  @if ($report->status === 'pending')
    <form
      action="{{ route('monitoring.tipsreports-resolve', $report->id) }}"
      method="POST"
      data-report-action="resolve">
      @csrf
      @method('PATCH')

      <button
        type="submit"
        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition rounded-lg bg-emerald-600 hover:bg-emerald-700">
        <i class="bi bi-check-circle"></i>
        Resolve
      </button>
    </form>


    <form
      action="{{ route('monitoring.tipsreports-reject', $report->id) }}"
      method="POST"
      data-report-action="reject">
      @csrf
      @method('PATCH')

      <button
        type="submit"
        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition bg-red-600 rounded-lg hover:bg-red-700">
        <i class="bi bi-x-circle"></i>
        Reject
      </button>
    </form>
  @endif


  <a href="{{ route('monitoring.tipsreports-index') }}"
    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium transition rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200">
    <i class="bi bi-arrow-left"></i>
    Kembali
  </a>
</div>
