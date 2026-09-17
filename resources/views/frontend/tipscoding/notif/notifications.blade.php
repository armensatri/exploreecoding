@extends('frontend.template.main')

@section('content-frontend')

  <div class="max-w-3xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-bold text-slate-800 mb-6">
      Notifications
    </h1>

    <div class="space-y-3">

      @forelse ($notifications as $notification)

        <div class="p-4 border border-slate-200 rounded-lg">

          <div class="font-medium text-slate-800">
            {{ \App\Support\TipscodingNotification::message($notification) }}
          </div>

          <div class="mt-1 text-sm text-slate-500">
            {{ $notification->data['comment'] ?? '--' }}
          </div>

        </div>

      @empty

        <div class="text-center text-slate-500 py-10">
          Belum ada notification.
        </div>

      @endforelse

    </div>

    <div class="mt-6">
      {{-- {{ $notifications->links() }} --}}
    </div>

  </div>

@endsection
