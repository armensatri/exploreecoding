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
          <form action="{{ route('statuses.store') }}"
            method="POST">
            @csrf

            <div class="app-cse-border">
              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="name"
                  label-name="Status..name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  value-default=""
                  error="name"
                  placeholder="Masukkan nama status"
                />

                <x-input
                  label-for="ss"
                  label-name="Status..ss"
                  type="text"
                  id="ss"
                  name="ss"
                  value-old="ss"
                  value-default=""
                  error="ss"
                  placeholder="Masukkan sorting status"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="bg"
                  label-name="Status..bg"
                  type="text"
                  id="bg"
                  name="bg"
                  value-old="bg"
                  value-default=""
                  error="bg"
                  placeholder="Masukkan background status, ex : bg-red-200"
                />

                <x-input
                  label-for="text"
                  label-name="Status..text"
                  type="text"
                  id="text"
                  name="text"
                  value-old="text"
                  value-default=""
                  error="text"
                  placeholder="Masukkan color text status, ex : text-red-800"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input-textarea
                  label-for="description"
                  label-name="Status..description"
                  id="description"
                  name="description"
                  value-old="description"
                  value-default=""
                  error="description"
                  placeholder="Masukkan description status"
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
@endsection
