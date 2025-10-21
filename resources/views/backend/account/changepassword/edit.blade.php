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
            @include('backend.sbreadcrumb.changepassword.edit')
          </div>

          <form action="{{ route('changepassword.update') }}"
            method="POST">
            @method('PATCH')
            @csrf

            <div class="x-border">
              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="current"
                  label-name="Password..lama"
                  type="password"
                  id="current"
                  name="current"
                  value-old=""
                  value-default=""
                  error="current"
                  placeholder="Masukkan password lama"
                />

                <x-input
                  label-for="password"
                  label-name="Password..baru"
                  type="password"
                  id="password"
                  name="password"
                  value-old=""
                  value-default=""
                  error="password"
                  placeholder="Masukkan password baru"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="confirmation"
                  label-name="Password..confirmation"
                  type="password"
                  id="confirmation"
                  name="confirmation"
                  value-old=""
                  value-default=""
                  error="confirmation"
                  placeholder="Masukkan password confirmation"
                />
              </div>

              <div class="mt-8">
                <x-button-update-data
                  button-name="Update data"
                />
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
@endsection
