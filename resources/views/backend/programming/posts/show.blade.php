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
        <div class="app-cse-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              post - {{ $post->title }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-data
              name="Id"
              :var="$post->id"
            />

            <x-show-data
              name="Create"
              :var="$post->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Update"
              :var="$post->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-data
              name="Publish"
              :var="$post->created_at->diffForHumans()"
            />

            <x-show-data
              name="Author"
              :var="$post->user->name"
            />

            <x-show-data
              name="Playlist"
              :var="$post->playlist->name"
            />

            <x-show-data
              name="Sorting"
              :var="$post->sp"
            />

            <x-show-data
              name="Title"
              :var="$post->title"
            />

            <x-show-data
              name="Slug"
              :var="$post->slug"
            />

            <x-show-data
              name="Excerpt"
              :var="$post->excerpt"
            />

            <div class="grid gap-4 pb-4 md:grid-cols-12 md:gap-6">
              <div class="md:col-span-3">
                <div class="text-base tracking-wide text-gray-800">
                  Content
                </div>
              </div>

              <div class="md:col-span-9">
                <div class="inline-block text-gray-800 bg-gray-100
                  px-2.5 py-0.5 rounded-[10px] text-sm tracking-wide">
                  <article class="p-4 leading-8 prose">
                    <x-markdown class="leading-8 prose lg:prose-lg">
                      {!! $post->content !!}
                    </x-markdown>
                  </article>
                </div>
              </div>
            </div>

            <x-show-data
              name="Views"
              :var="$post->views"
            />

            <x-show-background
              name="Status"
              :bg="$post->status->bg"
              :text="$post->status->text"
              :var="$post->status->name"
            />

            <x-show-image
              name="Image"
              :asset="$post->image"
              asset-default="/image/default.png"
            />

            <x-show-action
              name="Action"
              :edit="route('posts.edit', $post->slug)"
              :delete="route('posts.destroy', $post->slug)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
