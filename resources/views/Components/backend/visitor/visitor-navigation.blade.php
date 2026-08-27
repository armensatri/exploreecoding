<a href="{{ $route }}"
  class="px-3 py-0.5 font-medium flex items-center justify-center mb-2
  {{ Request::is($active) ? 'bg-blue-200 text-black
  border-gray-400 rounded-[10px] border' :
  'bg-gray-200 hover:bg-gray-300 hover:text-black
  text-slate-700 border border-gray-400 rounded-[10px]' }}">
  {{ $menuName }}
</a>
