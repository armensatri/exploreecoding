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
            @include('backend.xbreadcrumb.profile.edit')
          </div>

          <form action="{{ route('profile.update') }}"
            method="POST"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <div class="x-border">
              <div class="mb-4 tracking-wide font-semibold text-[26px] text-slate-800">
                Data personal
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="name"
                  label-name="Name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  :value-default="$user->name"
                  error="name"
                  placeholder="Masukkan name"
                />

                <x-input
                  label-for="username"
                  label-name="Username"
                  type="text"
                  id="username"
                  name="username"
                  value-old="username"
                  :value-default="$user->username"
                  error="username"
                  placeholder="Masukkan username"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-disable
                  label-for="email"
                  label-name="Email"
                  type="text"
                  id="email"
                  name="email"
                  value-old="email"
                  :value-default="$user->email"
                  error="email"
                  placeholder="Masukkan email"
                />

                <x-input-select
                  label-for="gender"
                  label-name="Gender"
                  id="gender"
                  name="gender"
                  :items="$genders"
                  value-old="gender"
                  :value-default="$user->gender"
                  error="gender"
                  placeholder="Select gender"
                  value-key="code"
                  label-key="name"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-image
                  label-for="image"
                  label-name="Profile image"
                  type="file"
                  id="image"
                  name="image"
                  error="image"
                />

                <x-input-image-preview
                  label-for="image"
                  label-name="Profile image preview"
                  :image="$user->image"
                />
              </div>

              <div class="mb-4 mt-20 tracking-wide font-semibold text-[26px] text-slate-800">
                Data region
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-select
                  label-for="province_code"
                  label-name="Provinsi"
                  id="province_code"
                  name="province_code"
                  :items="$provinces"
                  value-old="province_code"
                  :value-default="$user->province_code"
                  value-key="code"
                  error="province_code"
                  placeholder="Select provinsi"
                />

                <x-input-select
                  label-for="city_code"
                  label-name="Kabupaten/Kota"
                  id="city_code"
                  name="city_code"
                  :items="$cities"
                  value-old="city_code"
                  :value-default="$user->city_code"
                  error="city_code"
                  placeholder="Select Kabupaten/kota"
                  value-key="code"
                  :data-url="route('profile.cities', ':provinceCode')"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-select
                  label-for="district_code"
                  label-name="Kecamatan"
                  id="district_code"
                  name="district_code"
                  :items="$districts"
                  value-old="district_code"
                  :value-default="$user->district_code"
                  error="district_code"
                  placeholder="Select Kecamatan"
                  value-key="code"
                  :data-url="route('profile.districts', ':cityCode')"
                />
              </div>

              <div class="mb-4 mt-20 tracking-wide font-semibold text-[26px] text-slate-800">
                Data optional
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-textarea
                  label-for="bio"
                  label-name="Bio singkat tentang saya"
                  id="bio"
                  name="bio"
                  value-old="bio"
                  :value-default="$user->bio"
                  error="bio"
                  placeholder="Masukkan bio"
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
