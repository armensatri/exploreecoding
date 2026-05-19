<td class="size-px whitespace-nowrap">
  <div class="">
    <div class="flex justify-center">
      <div id="dropdownHoverButton-{{ $user->id }}"
        data-dropdown-toggle="dropdownHover-{{ $user->id }}" data-dropdown-trigger="hover"
        class="inline-flex items-center px-1 text-sm font-medium text-center cursor-pointer hover:text-blue-600">
        <i class="bi bi-gear-fill"></i>
      </div>

      <div id="dropdownHover-{{ $user->id }}"
        class="z-10 hidden p-3 mt-2 space-y-2 border border-gray-400 divide-y divide-gray-100 shadow-sm w-28 bg-slate-100 dark:bg-gray-700 rounded-2xl">

        <span class="block mb-2.5 text-xs font-medium text-gray-600 uppercase tracking-wide text-center">
          {{ $user->id }}
        </span>

        <span class="block mb-2.5 text-xs font-medium text-gray-600 uppercase tracking-wide text-center">
          Action
        </span>

        <div class="flex items-center justify-center gap-2">
          <div>
            <a href="{{ route('users.change.status',
              [
                'id' => $user->id,
                'status' => $user->status ? 'banned' : 'active'
              ]) }}"
              class="inline-flex items-center justify-center px-8 py-1.5 bg-green-700 rounded-xl hover:bg-green-800">
              <i class="text-base text-white bi bi-check2-circle"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</td>
