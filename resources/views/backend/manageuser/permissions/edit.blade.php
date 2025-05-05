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
          <form action="{{ route(
            'permissions.update', $permission->url) }}"
            method="POST">
            @method('PATCH')
            @csrf

            <div class="app-cse-border">
              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="name"
                  label-name="Permission..name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  :value-default="$permission->name"
                  error="name"
                  placeholder="Masukkan nama permission"
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
@endsection
