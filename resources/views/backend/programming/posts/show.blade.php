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
          @include('backend.sbreadcrumb.posts.show')
        </div>

        <div class="x-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              post - {{ $post->title }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-var
              name="Id"
              :var="$post->id"
            />

            <x-show-var
              name="Url"
              :var="$post->url"
            />

            <x-show-var
              name="Create"
              :var="$post->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Update"
              :var="$post->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Publish"
              :var="$post->created_at->diffForHumans()"
            />

            <div class="grid gap-4 pb-4 md:grid-cols-12 md:gap-6">
              <div class="md:col-span-3">
                <div class="text-base tracking-wide text-gray-800">
                  Content
                </div>
              </div>

              <div class="md:col-span-9">
                <div class="text-gray-800 bg-slate-50
                  px-2.5 py-0.5 rounded-md text-base tracking-wide">
                  <article class="font-inter max-w-max prose lg:prose-[18px]">
                    <x-markdown>
                      {!! $post->content !!}
                    </x-markdown>
                  </article>
                </div>
              </div>
            </div>

            <x-show-action
              name="Action"
              :indexs="route('posts.index')"
              :edit="route('posts.edit', $post->url)"
              :delete="route('posts.destroy', $post->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
