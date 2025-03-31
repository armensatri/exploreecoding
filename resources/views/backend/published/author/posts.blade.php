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
          @foreach ($posts as $post)
            <div>
              {{ $loop->iteration }}
              {{ $post->playlist->name }}
              <span class="{{ $post->status->bg }}">
                {{ $post->status->name }}
              </span>
              - {{ $post->id }} - {{ $post->title }}
            </div>
          @endforeach
        </div>
      </section>
    </div>
  </div>
@endSection
