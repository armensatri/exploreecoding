<div class="w-full py-2.5">
  <div class="flex ml-1 justify-start gap-1.5">
    <div>
      <label for="{{ $labelFor }}"
        class="block mb-1.5 text-base font-medium text-green-700">
        {{ $labelName }}
      </label>
    </div>
  </div>

  <select id="{{ $id }}"
    name="{{ $name }}"
    @if ($dataUrl)
      data-url="{{ $dataUrl }}"
    @endif
    class="bg-gray-50 border border-gray-300 text-gray-700
    text-sm rounded-[14px] focus:ring-1 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.25
    placeholder:tracking-wide
    placeholder:ps-3.25 tracking-wide cursor-pointer">
    <option disabled selected>
      {{ $placeholder }}
    </option>

    @foreach($items as $item)
      @if (old($valueOld, $valueDefault) == $item->{$valueKey})
        <option value="{{ $item->{$valueKey} }}" selected>
          {{ $item->{$valueKey} }} - {{ $item->{$labelKey} }}
        </option>
      @else
        <option value="{{ $item->{$valueKey} }}">
          {{ $item->{$valueKey} }} - {{ $item->{$labelKey} }}
        </option>
      @endif
    @endforeach
  </select>

  @error($error)
    <div class="mt-1 ml-3.5">
      <p class="font-serif text-sm font-medium tracking-wide text-red-500">
        {{ $message }}
      </p>
    </div>
  @enderror
</div>
