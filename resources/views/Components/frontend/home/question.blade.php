<div class="divide-y divide-gray-500 hs-accordion-group">
  <div class="pb-3 hs-accordion"
    id="hs-basic-with-title-and-arrow-stretched-heading-{{ $heading }}">

    <div aria-expanded="false"
      aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-{{ $collapse }}"
      class="inline-flex items-center justify-between w-full pb-3 font-semibold tracking-wide text-blue-600 transition rounded-lg cursor-pointer hs-accordion-toggle group gap-x-3 md:text-lg text-start">
      {{ $question }}

      <svg xmlns="http://www.w3.org/2000/svg"
        width="16"
        height="16"
        fill="currentColor"
        viewBox="0 0 16 16"
        class="block text-green-500 bi bi-arrow-down-circle hs-accordion-active:hidden size-5">
        <path fill-rule="evenodd"
          d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"
        />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg"
        width="16"
        height="16"
        fill="currentColor"
        viewBox="0 0 16 16"
        class="hidden text-red-500 hs-accordion-active:block size-5 bi bi-arrow-up-circle">
        <path fill-rule="evenodd"
          d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"
        />
      </svg>
    </div>

    <div role="region"
      id="hs-basic-with-title-and-arrow-stretched-collapse-{{ $collapse }}"
      class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
      <p class="text-[17px] text-gray-800 ml-3 tracking-tight">
        {{ $answer }}
      </p>
    </div>
    <hr class="mt-3.5 mb-3.5 text-gray-300">
  </div>
</div>
