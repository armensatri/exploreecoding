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
          <form action="{{ route('paths.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="app-cse-border">
              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="name"
                  label-name="Path..name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  value-default=""
                  error="name"
                  placeholder="Masukkan nama path"
                />

                <x-input
                  label-for="slug"
                  label-name="Path..slug"
                  type="text"
                  id="slug"
                  name="slug"
                  value-old="slug"
                  value-default=""
                  error="slug"
                  placeholder="Masukkan slug path"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="sp"
                  label-name="Path..sp"
                  type="text"
                  id="sp"
                  name="sp"
                  value-old="sp"
                  value-default=""
                  error="sp"
                  placeholder="Masukkan sorting path"
                />

                <x-input-select
                  label-for="status_id"
                  label-name="Path..status"
                  id="status_id"
                  name="status_id"
                  :items="$statuses"
                  value-old="status_id"
                  value-default=""
                  error="status_id"
                  placeholder="Select status for path"
                />

              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input-textarea
                  label-for="description"
                  label-name="Path..description"
                  id="description"
                  name="description"
                  value-old="description"
                  value-default=""
                  error="description"
                  placeholder="Masukkan description path"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input-image
                  label-for="image"
                  label-name="User..image"
                  type="file"
                  id="image"
                  name="image"
                  error="image"
                />

                <x-input-image-preview
                  label-for="image"
                  label-name="Path..preview"
                  :image="$path->image"
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
      fetch("/paths/slug?name=" + inputname.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
    });
  </script>
@endsection
