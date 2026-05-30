<div class="flex justify-center mb-10">
  <a href="{{ route('ec-tipscoding.index') }}">
    <button
      class="flex items-center cursor-pointer pl-3 pr-1.5 py-1.5 rounded-[10px] border text-[15px] font-medium text-blue-600 border-blue-400 bg-gray-100 tracking-wide hover:text-black hover:bg-gray-200 whitespace-nowrap">

      <img src="{{ asset(
        'frontend/img/navigation/tipscodings.png') }}"
        alt="image"
        class="object-contain w-4 h-4 mr-2 rounded-sm"
      />

      <span
        class="mr-1 text-green-600 underline underline-offset-2 decoration-green-500">
        Index semua tips
      </span>

      <span
        class="px-1.5 py-0.5 text-green-700 bg-gray-100 rounded-md text-[11px] ml-1 border border-gray-400 tracking-wider">
        {{ $totaltipscodings }} Tips
      </span>
    </button>
  </a>
</div>
