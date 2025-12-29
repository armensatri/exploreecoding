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
            @include('backend.sbreadcrumb.tipscodings.edit')
          </div>

          <form action="{{
            route('tipscodings.update', $tipscoding->url) }}"
            id="edit-editor"
            method="POST"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <div class="x-border">
              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input
                  label-for="title"
                  label-name="Tipscoding..title"
                  type="text"
                  id="title"
                  name="title"
                  value-old="title"
                  :value-default="$tipscoding->title"
                  error="title"
                  placeholder="Masukkan title tipscoding"
                />

                <x-input
                  label-for="slug"
                  label-name="Tipscoding..slug"
                  type="text"
                  id="slug"
                  name="slug"
                  value-old="slug"
                  :value-default="$tipscoding->slug"
                  error="slug"
                  placeholder="Masukkan slug tipscoding"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-select
                  label-for="category_id"
                  label-name="Tipscoding..category"
                  id="category_id"
                  name="category_id"
                  :items="$categories"
                  value-old="category_id"
                  :value-default="$tipscoding->category_id"
                  error="category_id"
                  placeholder="Select category for tipscoding"
                />

                <x-input-textarea
                  label-for="excerpt"
                  label-name="Tipscoding..excerpt"
                  id="excerpt"
                  name="excerpt"
                  value-old="excerpt"
                  :value-default="$tipscoding->excerpt"
                  error="excerpt"
                  placeholder="Masukkan excerpt tipscoding"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-image
                  label-for="image"
                  label-name="Tipscoding..image"
                  type="file"
                  id="image"
                  name="image"
                  error="image"
                />

                <x-input-image-preview
                  label-for="image"
                  label-name="Tipscoding..preview"
                  :image="$tipscoding->image"
                />
              </div>

              <div class="gap-8 xl:gap-14 max-auto md:flex">
                <x-input-editor-create
                  label-for="editor"
                  label-name="Tipscoding..content"
                  id="editor"
                  error="content"
                />

                <input type="hidden"
                  id="old-editor"
                  value="{{ $tipscoding->content }}"
                />

                <input type="hidden" name="content" id="content">
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
