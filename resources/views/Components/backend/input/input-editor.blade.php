<div class="w-full py-2">
  <div class="flex ml-1 justify-start gap-1.5">
    <div>
      <label for="{{ $labelFor }}"
        class="block mb-1.5 text-base font-medium text-green-700">
        {{ $labelName }}
      </label>
    </div>
  </div>

  <div class="flex flex-col space-y-2" id="tui">
    <div id="{{ $id }}"
      class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
    <div>
  </div>

  @error($error)
    <div class="mt-1 ml-2">
      <p class="font-serif text-sm font-medium tracking-wide text-red-500">
        {{ $message }}
      </p>
    </div>
  @enderror
</div>
