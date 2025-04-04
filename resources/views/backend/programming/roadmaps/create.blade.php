@extends('backend.template.main')

@section('content-backend')
  <div class="content">
    <div class="p-4 mx-auto">
      <section class="w-full px-4 mb-2">
        <div class="app-content">
          <div class="app-content-title">
            {{ $title }}
          </div>
        </div>
      </section>

      <section class="w-full px-4 mt-8 mb-5">
        <div class="w-full">
          <form action="{{ route('roadmaps.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="app-cse-border">
              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="name"
                  label-name="Roadmap..name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  value-default=""
                  error="name"
                  placeholder="Masukkan nama roadmap"
                />

                <x-input
                  label-for="slug"
                  label-name="Roadmap..slug"
                  type="text"
                  id="slug"
                  name="slug"
                  value-old="slug"
                  value-default=""
                  error="slug"
                  placeholder="Masukkan slug roadmap"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input-select
                  label-for="path_id"
                  label-name="Roadmap..path"
                  id="path_id"
                  name="path_id"
                  :items="$paths"
                  value-old="path_id"
                  value-default=""
                  error="path_id"
                  placeholder="Select path for roadmap"
                />

                <x-input
                  label-for="sr"
                  label-name="Roadmap..sr"
                  type="text"
                  id="sr"
                  name="sr"
                  value-old="sr"
                  value-default=""
                  error="sr"
                  placeholder="Masukkan sorting roadmap"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input-select
                  label-for="status_id"
                  label-name="Roadmap..status"
                  id="status_id"
                  name="status_id"
                  :items="$statuses"
                  value-old="status_id"
                  value-default=""
                  error="status_id"
                  placeholder="Select status for roadmap"
                />

                <x-input-textarea
                  label-for="description"
                  label-name="Roadmap..description"
                  id="description"
                  name="description"
                  value-old="description"
                  value-default=""
                  error="description"
                  placeholder="Masukkan description roadmap"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input-image
                  label-for="image"
                  label-name="Roadmap..image"
                  type="file"
                  id="image"
                  name="image"
                  error="image"
                />

                <x-input-image-preview
                  label-for="image"
                  label-name="Roadmap..preview"
                  :image="$roadmap->image"
                />
              </div>

              <div class="mt-8">
                <x-button-create-data
                  button-name="Create data"
                />
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>

  <script>
    const inputname = document.querySelector("#name");
    const slug = document.querySelector("#slug");

    inputname.addEventListener("change", function () {
      fetch("/roadmaps/slug?name=" + inputname.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
    });
  </script>
@endsection
