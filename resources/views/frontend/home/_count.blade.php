<section class="px-3 mt-16">
  <div class="max-w-6xl mx-auto text-center">
    <div class="px-4 py-10 mx-auto">
      <div
        class="lg:grid lg:grid-cols-12 lg:gap-16 lg:items-center lg:justify-between">
        <!-- LEFT CONTENT -->
        <div class="lg:col-span-5 lg:col-start-1">
          <div class="mb-8">
            <h2
              class="leading-10 mb-5 text-[33px] font-bold tracking-tight text-gray-800">
              Belajar Coding Bersama
              <span class="text-blue-400">
                Exploreecoding
              </span>
            </h2>

            <p class="text-xl text-gray-800">
              ExploreeCoding membantu kamu belajar programming secara terstruktur melalui
              <span class="text-blue-700">
                paths
              </span>,
              <span class="text-blue-700">
                roadmaps
              </span>,
              <span class="text-blue-700">
                playlists
              </span>,
              dan
              <span class="text-blue-700">
                post/materi
              </span>
              yang mudah dipahami.
            </p>
          </div>

          <blockquote class="relative">
            <div class="relative z-10">
              <p class="text-xl italic text-gray-800 dark:text-white">
                “Materinya terstruktur, roadmapnya jelas, dan sangat membantu belajar coding dari nol.”
              </p>
            </div>
          </blockquote>
        </div>

        <!-- RIGHT STATS -->
        <div class="mt-10 lg:mt-0 lg:col-span-6 lg:col-end-13">
          <div class="space-y-6 sm:space-y-8">
            <ul
              class="grid grid-cols-2 overflow-hidden divide-x divide-y divide-blue-300">
              <li class="flex flex-col -m-0.5 p-4 sm:p-8">
                <div
                  class="mb-2 text-3xl font-bold text-gray-800 sm:text-5xl dark:text-neutral-200">
                  {{ $paths->count() }}+
                </div>

                <p>
                  <span
                    class="text-sm font-semibold tracking-wide text-blue-500 uppercase">
                    Path
                  </span><br>
                  tersedia
                </p>
              </li>

              <li class="flex flex-col -m-0.5 p-4 sm:p-8">
                <div class="mb-2 text-3xl font-bold text-gray-800 sm:text-5xl dark:text-neutral-200">
                  {{ $roadmaps }}+
                </div>
                <p>
                  <span class="text-sm font-semibold tracking-wide text-blue-500 uppercase">
                  Roadmap
                  </span><br>
                  terstruktur
                </p>
              </li>

              <li class="flex flex-col -m-0.5 p-4 sm:p-8">
                <div class="mb-2 text-3xl font-bold text-gray-800 sm:text-5xl dark:text-neutral-200">
                  {{ $playlists }}+
                </div>
                <p>
                  <span class="text-sm font-semibold tracking-wide text-blue-500 uppercase">
                  Playlist
                  </span><br>
                  pembelajaran
                </p>
              </li>

              <li class="flex flex-col -m-0.5 p-4 sm:p-8">
                <div class="mb-2 text-3xl font-bold text-gray-800 sm:text-5xl dark:text-neutral-200">
                  {{ $posts }}+
                </div>
                <p>
                  <span class="text-sm font-semibold tracking-wide text-blue-500 uppercase">
                  Materi
                  </span><br>
                  edukatif
                </p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
