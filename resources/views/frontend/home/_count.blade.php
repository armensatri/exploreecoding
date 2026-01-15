<section class="px-3 mt-16">
  <div class="max-w-6xl mx-auto text-center">
    <div class="px-4 py-10 mx-auto">
      <div
        class="lg:grid lg:grid-cols-12 lg:gap-16 lg:items-center lg:justify-center">
        <div class="lg:col-span-6 lg:col-start-1">
          <div class="mb-8">
            <h2
              class="mb-5 text-3xl font-bold leading-10 tracking-tight text-gray-800">
              Belajar Coding Bersama <br>
              <span class="text-blue-500">
                Exploreecoding
              </span>
            </h2>

            <p class="max-w-xl mx-auto text-lg text-gray-700">
              Exploreecoding membantu kamu belajar programming secara terstruktur melalui
              <span class="text-blue-700">
                paths,
              </span>
              <span class="text-blue-700">
                roadmaps,
              </span>
              <span class="text-blue-700">
                playlists,
              </span>
              dan
              <span class="text-blue-700">
                post/materi
              </span>
              yang mudah dipahami.
            </p>
          </div>

          <blockquote class="relative">
            <div class="relative z-10">
              <p class="text-lg italic text-gray-700">
                “Materinya terstruktur, roadmapnya jelas, dan sangat membantu belajar coding dari nol.”
              </p>
            </div>
          </blockquote>
        </div>

        <div class="mt-10 lg:mt-0 lg:col-span-6 lg:col-end-13">
          <div class="space-y-6 sm:space-y-8">
            <ul
              class="grid grid-cols-2 overflow-hidden divide-x divide-y divide-gray-300">
              <li class="flex flex-col -m-0.5 p-4 sm:p-8">
                <div class="mb-2 text-3xl font-bold text-gray-800">
                  {{ $paths->count() }}+
                </div>
                <p>
                  <span
                    class="text-base font-semibold tracking-tight text-blue-500 uppercase">
                    Path
                  </span>
                  <br>
                  <span class="text-lg tracking-wide text-gray-700">
                    Tersedia
                  </span>
                </p>
              </li>

              <li class="flex flex-col -m-0.5 p-4 sm:p-8">
                <div class="mb-2 text-3xl font-bold text-gray-800">
                  {{ $roadmaps }}+
                </div>
                <p>
                  <span class="text-base font-semibold tracking-tight text-blue-500 uppercase">
                  Roadmap
                  </span>
                  <br>
                  <span class="text-lg tracking-wide text-gray-700">
                    Terstruktur
                  </span>
                </p>
              </li>

              <li class="flex flex-col -m-0.5 p-4 sm:p-8">
                <div class="mb-2 text-3xl font-bold text-gray-800">
                  {{ $playlists }}+
                </div>
                <p>
                  <span class="text-base font-semibold tracking-tight text-blue-500 uppercase">
                  Playlist
                  </span>
                  <br>
                  <span class="text-lg tracking-wide text-gray-700">
                    Belajar
                  </span>
                </p>
              </li>

              <li class="flex flex-col -m-0.5 p-4 sm:p-8">
                <div class="mb-2 text-3xl font-bold text-gray-800">
                  {{ $posts }}+
                </div>
                <p>
                  <span class="text-base font-semibold tracking-tight text-blue-500 uppercase">
                  Materi
                  </span>
                  <br>
                  <span class="text-lg tracking-wide text-gray-700">
                    Edukatif
                  </span>
                </p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
