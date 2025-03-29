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

      @if (session()->has('alert'))
        @include('sweetalert::alert')
      @endif

      <section class="w-full px-4 mt-8 mb-5">
        <div class="w-full">
          <form action="{{ route('change.password.update') }}"
            method="POST">
            @method('PATCH')
            @csrf

            <div class="app-cse-border">
              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="password_lama"
                  label-name="Password..lama"
                  type="password"
                  id="password_lama"
                  name="password_lama"
                  value-old=""
                  value-default=""
                  error="password_lama"
                  placeholder="Masukkan password lama"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="password_baru"
                  label-name="Password..baru"
                  type="password"
                  id="password_baru"
                  name="password_baru"
                  value-old=""
                  value-default=""
                  error="password_baru"
                  placeholder="Masukkan password baru"
                />

                <x-input
                  label-for="password_konfirmasi"
                  label-name="Password..konfirmasi"
                  type="password"
                  id="password_konfirmasi"
                  name="password_konfirmasi"
                  value-old=""
                  value-default=""
                  error="password_konfirmasi"
                  placeholder="Masukkan password konfirmasi"
                />
              </div>

              <div class="mt-8">
                <x-button-edit-data
                  button-name="Update data"
                />
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
@endSection
