@extends('backend.template.main')

@section('content-backend')
  <div class="content">
    <div class="p-4 mx-auto">
      <section class="w-full px-4 mb-2">
        <div class="app-content">
          <div class="app-content-title">
            {{ $title }}
          </div>
        </div>
      </section>

      <section class="w-full px-4 mt-8 mb-5">
        <div class="app-cse-border">
          <div class="flex gap-4">
            <div class="p-4 border rounded-lg shadow-md card w-80">
              <div class="flex items-center justify-between mb-2 text-gray-500 card-header">
                <span class="play-icon">▷</span>
                <span class="text-sm duration">36 menit</span>
              </div>

              <div class="card-body">
                <h3 class="mb-1 text-lg font-semibold card-title">Laravel Wayfinder</h3>
                <p class="text-sm text-gray-700 card-description">Kita akan mempelajari bagaimana menggunakan wayfinder serta mempelajari juga best practice nya.</p>
              </div>

              <div class="flex items-center mt-3 card-footer">
                <span class="px-2 py-1 mr-1 text-xs text-gray-800 bg-gray-100 rounded-md tag">Laravel</span>
                <span class="text-xs text-gray-500 episode">2 eps</span>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endSection
