@extends('frontend.template.main')

@section('content-frontend')
<div class="relative px-6 bg-sky-100 isolate pt-14 lg:px-8">
  <div class="py-8 rounded-3xl">
    <div class="bg-sky-50 rounded-3xl">
      <div class="w-full p-6 mx-auto max-w-7xl">
        <div class="flex flex-col gap-6 lg:flex-row">

          <div class="w-full space-y-5 lg:w-1/3">
            <h1 class="mb-6 text-3xl font-bold">Semua path</h1>
            <!-- DROPDOWN SAAT SM & MD -->
            <div class="lg:hidden">
              <label class="block mb-2 text-sm font-medium text-gray-600">Pilih Path</label>
              <select class="w-full p-3 bg-white border shadow-sm rounded-xl focus:ring-2 focus:ring-blue-500">
                @foreach ($paths as $path)
                  <option value="{{ $path->slug }}">{{ $path->name }}</option>
                @endforeach
              </select>
            </div>

            <!-- CARD LIST SAAT LG & XL -->
            <div class="hidden lg:flex lg:flex-col lg:gap-4">
              @foreach ($paths as $path)
                <a href="{{ route('paths.show', $path->slug) }}">
                  <div class="flex gap-4 p-4 transition border border-gray-200 cursor-pointer bg-gray-50 rounded-2xl hover:shadow-md">
                    <span class="flex items-center font-medium text-gray-500">{{ $path->sp }}</span>
                    <img src="https://picsum.photos/90?random={{ $path->id }}" class="object-cover w-20 h-20 rounded-lg" />
                    <div class="flex-1 space-y-1">
                      <p class="font-semibold text-gray-800 line-clamp-1">{{ $path->name }}</p>
                      <p class="text-sm text-gray-500 line-clamp-2">
                        {{ $path->short_description ?? 'Deskripsi belum tersedia.' }}
                      </p>
                      <div class="flex items-center gap-2 text-sm text-gray-500">
                        ⭐ 5 (1034) · All levels
                      </div>
                    </div>
                  </div>
                </a>
              @endforeach
            </div>
          </div>

          <div class="w-full p-6 space-y-5 bg-white shadow lg:w-2/3 rounded-2xl">
            <img src="https://picsum.photos/900/450?1" class="object-cover w-full rounded-2xl" />

            <div class="flex items-center gap-3 text-sm text-gray-600">
              ⭐⭐⭐⭐
              <span>4 (294)</span>
              •
              <span>Intermediate</span>
            </div>

            <h2 class="text-2xl font-bold text-gray-800">
              English for career development
            </h2>

            <p class="leading-relaxed text-gray-600">
              In this course, you will learn about the job search, application, and interview process while comparing
              and contrasting the same process in your home country. This course also gives you the opportunity to
              explore your global career path while building your vocabulary and improving your English proficiency.
            </p>
          </div>
        </div>

         <div class="grid table-pagination">
                    @if ($paths->lastPage() > 1)
                      <x-pagination
                        :pagination="$paths"
                      />
                    @endif
                  </div>
      </div>
    </div>
  </div>
</div>
@endsection
