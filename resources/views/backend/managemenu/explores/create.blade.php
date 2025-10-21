@extends('backend.template.main')

@section('content-backend')
  <div class="content">
    <div class="p-4 mx-auto">
      <section class="w-full px-2 mb-2">
        <div class="content-backend">
          <div class="content-backend-title">
            {{ $title }}
          </div>
        </div>
      </section>

      <section class="w-full px-3 mt-8 mb-5">
        <div class="w-full">
          <div class="breadcrumb">
            @include('backend.sbreadcrumb.explores.create')
          </div>

          <form action="{{ route('explores.store') }}"
            method="POST">
            @csrf

            <div class="x-border">
              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="name"
                  label-name="Explore..name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  value-default=""
                  error="name"
                  placeholder="Masukkan nama explore"
                />

                <x-input
                  label-for="slug"
                  label-name="Explore..slug"
                  type="text"
                  id="slug"
                  name="slug"
                  value-old="slug"
                  value-default=""
                  error="slug"
                  placeholder="Masukkan slug explore"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="se"
                  label-name="Explore..se"
                  type="text"
                  id="se"
                  name="se"
                  value-old="se"
                  value-default=""
                  error="se"
                  placeholder="Masukkan sorting explore"
                />

                <x-input
                  label-for="routee"
                  label-name="Explore..route"
                  type="text"
                  id="routee"
                  name="routee"
                  value-old="routee"
                  value-default=""
                  error="routee"
                  placeholder="Masukkan route explore"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="button_name"
                  label-name="Explore..button"
                  type="text"
                  id="button_name"
                  name="button_name"
                  value-old="button_name"
                  value-default=""
                  error="button_name"
                  placeholder="Masukkan button name explore"
                />

                <x-input-textarea
                  label-for="description"
                  label-name="Explore..description"
                  id="description"
                  name="description"
                  value-old="description"
                  value-default=""
                  error="description"
                  placeholder="Masukkan description explore"
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
      fetch("/explores/slug?name=" + inputname.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
    });
  </script>
@endsection
