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
        <div class="breadcrumb">
          @include('backend.xbreadcrumb.sosmed.edit')
        </div>

        <form action="{{ route('sosmeds.update', $user->username) }}"
          method="POST">
          @method('PATCH')
          @csrf

          <div class="x-border">
            <div class="mb-4 tracking-tighter text-gray-600">
              Note: ini optional saja, jika ada sosmed masukkan, jika tidak ada kosongkan saja
            </div>

            <div class="gap-8 xl:gap-14 max-auto md:flex">
              <x-input
                label-for="github"
                label-name="Username sosmed..github"
                type="text"
                id="github"
                name="github"
                value-old="github"
                :value-default="$sosmed?->github"
                error="github"
                placeholder="username your account github"
              />

              <x-input
                label-for="linkedin"
                label-name="Username sosmed..linkedin"
                type="text"
                id="linkedin"
                name="linkedin"
                value-old="linkedin"
                :value-default="$sosmed?->linkedin"
                error="linkedin"
                placeholder="username your account linkedin"
              />
            </div>

            <div class="gap-8 xl:gap-14 max-auto md:flex">
              <x-input
                label-for="threads"
                label-name="Username sosmed..threads"
                type="text"
                id="threads"
                name="threads"
                value-old="threads"
                :value-default="$sosmed?->threads"
                error="threads"
                placeholder="username your account threads"
              />

              <x-input
                label-for="instagram"
                label-name="Username sosmed..instagram"
                type="text"
                id="instagram"
                name="instagram"
                value-old="instagram"
                :value-default="$sosmed?->instagram"
                error="instagram"
                placeholder="username your account instagram"
              />
            </div>

            <div class="gap-8 xl:gap-14 max-auto md:flex">
              <x-input
                label-for="x"
                label-name="Username sosmed..x"
                type="text"
                id="x"
                name="x"
                value-old="x"
                :value-default="$sosmed?->x"
                error="x"
                placeholder="username your account x"
              />

              <x-input
                label-for="facecook"
                label-name="Username sosmed..facecook"
                type="text"
                id="facecook"
                name="facecook"
                value-old="facecook"
                :value-default="$sosmed?->facebook"
                error="facecook"
                placeholder="username your account facecook"
              />
            </div>

            <div class="gap-8 xl:gap-14 max-auto md:flex">
              <x-input
                label-for="tiktok"
                label-name="Username sosmed..tiktok"
                type="text"
                id="tiktok"
                name="tiktok"
                value-old="tiktok"
                :value-default="$sosmed?->tiktok"
                error="tiktok"
                placeholder="username your account tiktok"
              />
            </div>

            <div class="mt-8">
              <x-button-update-data
                button-name="Update data"
              />
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
@endsection
