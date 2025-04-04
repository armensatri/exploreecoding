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
          <form action="{{ route('posts.update', $post->url) }}"
            method="POST"
            id="edit-editor"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <div class="app-cse-border">
              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="title"
                  label-name="Post..title"
                  type="text"
                  id="title"
                  name="title"
                  value-old="title"
                  :value-default="$post->title"
                  error="title"
                  placeholder="Masukkan title post"
                />

                <x-input
                  label-for="slug"
                  label-name="Post..slug"
                  type="text"
                  id="slug"
                  name="slug"
                  value-old="slug"
                  :value-default="$post->slug"
                  error="slug"
                  placeholder="Masukkan slug post"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input-select
                  label-for="playlist_id"
                  label-name="Post..playlist"
                  id="playlist_id"
                  name="playlist_id"
                  :items="$playlists"
                  value-old="playlist_id"
                  :value-default="$post->playlist_id"
                  error="playlist_id"
                  placeholder="Select playlist for post"
                />

                <x-input
                  label-for="sp"
                  label-name="Post..sp"
                  type="text"
                  id="sp"
                  name="sp"
                  value-old="sp"
                  :value-default="$post->sp"
                  error="sp"
                  placeholder="Masukkan sorting post"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input-select
                  label-for="status_id"
                  label-name="Post..status"
                  id="status_id"
                  name="status_id"
                  :items="$statuses"
                  value-old="status_id"
                  :value-default="$post->status_id"
                  error="status_id"
                  placeholder="Select status for post"
                />

                <x-input-textarea
                  label-for="excerpt"
                  label-name="Post..excerpt"
                  id="excerpt"
                  name="excerpt"
                  value-old="excerpt"
                  :value-default="$post->excerpt"
                  error="excerpt"
                  placeholder="Masukkan excerpt post"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input-editor
                  label-for="content"
                  label-name="Post..content"
                  id="editor"
                  error="content"
                />

                <input type="hidden"
                  id="content"
                  name="content"
                />

                <input type="hidden"
                  id="old-editor"
                  value="{{ $post->content }}"
                />
              </div>

              <div class="gap-8 mx-auto mt-10 md:flex">
                <x-input-image
                  label-for="image"
                  label-name="Post..image"
                  type="file"
                  id="image"
                  name="image"
                  error="image"
                />

                <x-input-image-preview
                  label-for="image"
                  label-name="Post..preview"
                  :image="$post->image"
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

  <script>
    const inputtitle = document.querySelector("#title");
    const slug = document.querySelector("#slug");

    inputtitle.addEventListener("change", function () {
      fetch("/posts/slug?title=" + inputtitle.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
    });
  </script>
@endsection
