<div class="flex items-center justify-center">
  <div class="px-4 py-3">
    <div class="">
      @if ($asset)
        <div class="hs-tooltip">
          <div class="rounded-full hs-tooltip-toggle hover:cursor-pointer">
            <img src="{{
              $asset ? asset('storage/' . $asset) :
              asset($assetDefault) }}"
              alt="user-image"
              class="inline-block object-cover object-top rounded-full size-8"
            />

            <div role="tooltip"
              class="absolute z-10 flex items-center justify-center invisible transition-opacity border border-gray-500 shadow-md opacity-0 bg-sky-50 rounded-3xl hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible">

              <img src="{{
                $asset ? asset('storage/' . $asset) :
                asset($assetDefault) }}"
                alt="user-image"
                class="p-2 h-62.5 w-62.5 rounded-3xl object-cover object-top"
              />
            </div>
          </div>
        </div>
      @else
        <div class="hs-tooltip">
          <div class="inline-flex items-center justify-center rounded-full hs-tooltip-toggle">

            <img src="{{
              $asset ? asset('storage/' . $asset) :
              asset($assetDefault) }}"
              alt="user-image"
              class="object-cover object-center rounded-full size-8"
            />
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
