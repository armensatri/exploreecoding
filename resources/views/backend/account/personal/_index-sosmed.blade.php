@php
  $socialMedias = \App\Helpers\Media::Sosmed();
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
    class="flex items-center justify-center px-4 py-2 text-[15px] text-gray-500">
      No sosmed, create or edit in profile
  </div>
@endif
