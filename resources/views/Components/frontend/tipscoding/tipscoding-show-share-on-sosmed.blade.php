<div class="relative flex flex-col items-center group">
  <a href="{{ $link }}"
    target="_blank"
    rel="noopener noreferrer"
    class="mx-1.5 rounded-full ring-1 ring-slate-500 ring-offset-2">
    <img src="{{ asset($image) }}"
      alt="{{ $alt }}"
      loading="lazy"
      class="w-8 h-8 rounded-full drop-shadow-sm"
    />
  </a>

  <div
    class="absolute hidden px-3 py-1 mb-2 text-xs tracking-wide text-white rounded-md shadow-lg bottom-full group-hover:block bg-slate-800 whitespace-nowrap">
    {{ $tooltip }}
  </div>

  <span class="flex items-center mt-2 text-xs gap-x-1 text-slate-600">
    <i class="text-2xs bi bi-share"></i> -
    {{ $shareCount }}
  </span>
</div>
