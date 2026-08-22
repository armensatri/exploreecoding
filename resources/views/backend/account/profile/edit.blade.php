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
                  label-name="User..name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  :value-default="$user->name"
                  error="name"
                  placeholder="Masukkan nama user"
                />

                <x-input
                  label-for="username"
                  label-name="User..username"
                  type="text"
                  id="username"
                  name="username"
                  value-old="username"
                  :value-default="$user->username"
                  error="username"
                  placeholder="Masukkan username user"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-disable
                  label-for="email"
                  label-name="User..email"
                  type="text"
                  id="email"
                  name="email"
                  value-old="email"
                  :value-default="$user->email"
                  error="email"
                  placeholder="Masukkan email user"
                />

                <x-input-select
    label-for="gender"
    label-name="Jenis Kelamin"
    id="gender"
    name="gender"
    :items="$genders"
    value-old="gender"
    :value-default="$user->gender"
    error="gender"
    placeholder="Pilih Jenis Kelamin"
    value-key="code"
    label-key="name"
/>
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
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
                  label-name="User..preview"
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
                  value-default=""
                  error="bio"
                  placeholder="Masukkan bio"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="threads"
                  label-name="Account..threads"
                  type="text"
                  id="threads"
                  name="threads"
                  value-old="threads"
                  value-default=""
                  error="threads"
                  placeholder="Masukkan username threads"
                />

                <x-input
                  label-for="instagram"
                  label-name="Account..instagram"
                  type="text"
                  id="instagram"
                  name="instagram"
                  value-old="instagram"
                  value-default=""
                  error="instagram"
                  placeholder="Masukkan username instagram"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="x"
                  label-name="Account..x"
                  type="text"
                  id="x"
                  name="x"
                  value-old="x"
                  value-default=""
                  error="x"
                  placeholder="Masukkan username X"
                />

                <x-input
                  label-for="facebook"
                  label-name="Account..facebook"
                  type="text"
                  id="facebook"
                  name="facebook"
                  value-old="facebook"
                  value-default=""
                  error="facebook"
                  placeholder="Masukkan username facebook"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="tiktok"
                  label-name="Account..tiktok"
                  type="text"
                  id="tiktok"
                  name="tiktok"
                  value-old="tiktok"
                  value-default=""
                  error="tiktok"
                  placeholder="Masukkan username tiktok"
                />

                <x-input
                  label-for="github"
                  label-name="Account..github"
                  type="text"
                  id="github"
                  name="github"
                  value-old="github"
                  value-default=""
                  error="github"
                  placeholder="Masukkan username github"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="linkedin"
                  label-name="Account..linkedin"
                  type="text"
                  id="linkedin"
                  name="linkedin"
                  value-old="linkedin"
                  value-default=""
                  error="linkedin"
                  placeholder="Masukkan username linkedin"
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
