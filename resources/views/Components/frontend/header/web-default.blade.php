<span class="ms-2.5 mb-4 tracking-wider font-bold text-base
  uppercase text-green-700 text-center mt-4">
  {{ $namaApp }}
</span>

<div class="inline-flex justify-center">
  <img src="{{ $img }}"
    alt="{{ $alt }}"
    class="size-32"
  />
</div>

<div class="mb-3 text-center grow">
  <div class="p-2 text-[15px] font-medium text-gray-600">
    {{ $description }}
  </div>

  <a href="{{ $route }}">
    <button
      class="text-sm font-medium bg-blue-200 hover:bg-blue-700
      text-black px-2.5 py-1 rounded-[11px] border border-gray-400 cursor-pointer tracking-wide hover:text-white hover:tracking-wider">
      Getstarted
    </button>
  </a>
</div>
