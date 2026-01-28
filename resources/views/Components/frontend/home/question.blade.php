<div
  class="divide-y divide-gray-500 hs-accordion-group dark:divide-neutral-700">
  <div class="pb-3 hs-accordion active"
    id="hs-basic-with-title-and-arrow-stretched-heading-{{ $heading }}">
    <div aria-expanded="true"
      aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-{{ $collapse }}"
      class="inline-flex items-center justify-between w-full pb-3 font-semibold tracking-wide text-blue-500 transition rounded-lg cursor-pointer hs-accordion-toggle group gap-x-3 md:text-lg text-start">
      {{ $question }}

      <svg
        class="block text-gray-600 hs-accordion-active:hidden shrink-0 size-5 group-hover:text-gray-500"
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round">
        <path d="m6 9 6 6 6-6"/>
      </svg>

      <svg
        class="hidden text-gray-600 hs-accordion-active:block shrink-0 size-5 group-hover:text-gray-500"
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round">
        <path d="m18 15-6-6-6 6"/>
      </svg>
    </div>

    <div role="region"
      aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-{{ $heading }}"
      id="hs-basic-with-title-and-arrow-stretched-collapse-{{ $collapse }}"
      class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300">
      <p class="text-[17px] text-gray-700">
        {{ $answer }}
      </p>
    </div>
    <hr class="mt-3.5 mb-3.5 text-gray-300">
  </div>
</div>
