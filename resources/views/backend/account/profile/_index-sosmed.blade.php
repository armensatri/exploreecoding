@php
  $socialMedias = [
    'github' => [
      'url' => 'https://www.github.com/',
      'image' => 'github.png',
    ],

    'linkedin' => [
      'url' => 'https://www.linkedin.com/in/',
      'image' => 'linkedin.png',
    ],

    'threads' => [
      'url' => 'https://www.threads.com/@',
      'image' => 'threads.png',
    ],

    'instagram' => [
      'url' => 'https://www.instagram.com/',
      'image' => 'instagram.png',
    ],

    'x' => [
      'url' => 'https://x.com/',
      'image' => 'x.png',
    ],

    'facebook' => [
      'url' => 'https://www.facebook.com/',
      'image' => 'facebook.png',
    ],

    'tiktok' => [
      'url' => 'https://www.tiktok.com/@',
      'image' => 'tiktok.png',
    ],
  ];
@endphp

@if ($sosmed)
  <div class="flex flex-wrap items-center justify-center gap-3">
    @foreach ($socialMedias as $platform => $data)
      @if (filled($sosmed->$platform))
        <x-monitoring-social-media
          :link="$data['url'] . $sosmed->$platform"
          :image="asset('frontend/img/sosmed/' . $data['image'])"
          :tooltip="$sosmed->$platform"
        />
      @endif
    @endforeach
  </div>
@else
  <div
    class="flex items-center justify-center px-4 py-2 text-sm text-gray-500">
      No sosmed, create or edit
  </div>
@endif
