@php
  use Illuminate\Support\Str;

  $class = $attributes->get('class');
  $textcolor = Str::contains($class, 'text-');
@endphp

<li class="inline-flex items-center">
  <div {{
    $attributes->merge([
      'class' => 'flex items-center text-sm italic tracking-wide' .
        ($textcolor ? '' : ' text-gray-600')
      ])
    }}>
    {{ $name }}
  </div>
</li>
