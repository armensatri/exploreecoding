@php
  $socialMedias = \App\Helpers\Media::Sosmed();
@endphp

@if ($sosmed)
  <div
    class="flex flex-nowrap items-center justify-center gap-5 px-4 py-2 w-max">
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
@endif
