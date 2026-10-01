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
          @include(
            'backend.monitoring.tipsreport._show-tipscoding'
          )

          {{-- report information --}}
          @include(
            'backend.monitoring.tipsreport._show-report-information'
          )

          {{-- report comment --}}
          @include(
            'backend.monitoring.tipsreport._show-report-comment'
          )

          {{-- report detail --}}
          @include(
            'backend.monitoring.tipsreport._show-report-detail'
          )

          {{-- handle by --}}
          @include(
            'backend.monitoring.tipsreport._show-handle-by'
          )

          {{-- action --}}
          @include(
            'backend.monitoring.tipsreport._show-action'
          )
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

      const action = form.dataset.reportAction;
      const isResolve = action === 'resolve';


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
