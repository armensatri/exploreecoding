@if ($asset)
  <div class="hs-tooltip">
    <div
      class="inline-flex items-center justify-center rounded-full hs-tooltip-toggle hover:cursor-pointer bg-gray-50 hover:bg-gray-400 hover:border-blue-200 hover:text-blue-600">

      <img src="{{
        $asset ? asset('storage/' . $asset) :
        asset($assetDefault) }}"
        alt="user-image"
        class="rounded-full size-6"
      />

      <div
        class="absolute z-10 flex items-center justify-center invisible transition-opacity border border-gray-500 shadow-md opacity-0 bg-sky-50 rounded-3xl hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible" role="tooltip">

        <img src="{{
          $asset ? asset('storage/' . $asset) :
          asset($assetDefault) }}"
          alt="user-image"
          class="p-2 h-[250px] w-[250px] rounded-3xl"
        />
      </div>
    </div>
  </div>
@else
  <div class="hs-tooltip">
    <div
      class="inline-flex items-center justify-center rounded-full hs-tooltip-toggle hover:cursor-pointer bg-gray-50 hover:bg-gray-400 hover:border-blue-200 hover:text-blue-600 ">

      <img src="{{
        $asset ? asset('storage/' . $asset) :
        asset($assetDefault) }}"
        alt="user-image"
        class="rounded-full size-8"
      />

      <div
        class="absolute z-10 flex items-center justify-center invisible transition-opacity border border-gray-500 shadow-md opacity-0 bg-sky-50 rounded-3xl hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible" role="tooltip">

        <img src="{{
          $asset ? asset('storage/' . $asset) :
          asset($assetDefault) }}"
          alt="user-image"
          class="p-2 h-[250px] w-[250px] rounded-3xl"
        />
      </div>
    </div>
  </div>
@endif
