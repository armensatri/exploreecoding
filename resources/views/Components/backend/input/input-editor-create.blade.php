<div class="w-full py-2.5">
  <div class="flex ml-1 justify-start gap-1.5">
    <div>
      <label for="{{ $labelFor }}"
        class="block mb-1.5 text-base font-medium text-green-700">
        {{ $labelName }}
      </label>
    </div>
  </div>

  <div class="flex flex-col space-y-2">
    <div id="{{ $id }}"
      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    </div>
  </div>

  @error($error)
    <div class="mt-1 ml-3.5">
      <p class="font-serif text-sm font-medium tracking-wide text-red-500">
        {{ $message }}
      </p>
    </div>
  @enderror
</div>
