<a href="{{ $route }}"
  class="px-3 py-0.5 font-medium flex items-center justify-center mb-2
  {{ Request::is($active) ? 'bg-blue-200 text-black
  border-gray-400 rounded-xl border' :
  'bg-gray-200 text-slate-700 border border-gray-400 rounded-xl' }}">
  {{ $menuName }}
</a>
