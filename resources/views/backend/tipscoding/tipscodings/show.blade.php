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
          @include('backend.sbreadcrumb.tipscodings.show')
        </div>

        <div class="x-border">
          <div class="max-w-xl py-4 mx-auto text-center">
            <div class="text-xl font-semibold tracking-wide text-gray-900 uppercase md:text-2xl">
              Tipscoding - {{ $tipscoding->title }}
            </div>
          </div>

          <div class="mt-6 space-y-4 sm:mt-8">
            <x-show-var
              name="Id"
              :var="$tipscoding->id"
            />

            <x-show-var
              name="Url"
              :var="$tipscoding->url"
            />

            <x-show-var
              name="Create"
              :var="$tipscoding->created_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Update"
              :var="$tipscoding->updated_at->format('d-m-Y - H:i:s')"
            />

            <x-show-var
              name="Publish"
              :var="$tipscoding->created_at->diffForHumans()"
            />

            <x-show-var
              name="User"
              :var="'@' . $tipscoding->user->username"
            />

            <x-show-var
              name="Category"
              :var="$tipscoding->category->name"
            />

            <x-show-var
              name="Title"
              :var="$tipscoding->title"
            />

            <x-show-var
              name="Slug"
              :var="$tipscoding->slug"
            />

            <x-show-var
              name="Excerpt"
              :var="$tipscoding->excerpt"
            />

            <x-show-image
              name="Image"
              :asset="$tipscoding->image"
              :asset-default="asset('image/default.png')"
            />

            <div class="grid gap-4 pb-4 md:grid-cols-12 md:gap-6">
              <div class="md:col-span-3">
                <div class="text-base tracking-wide text-gray-800">
                  Content
                </div>
              </div>

              <div class="md:col-span-9">
                <div class="bg-slate-50
                  px-2.5 py-0.5 rounded-xl text-base tracking-wide">
                  <article class="px-4 text-gray-800 prose max-w-none
                    prose-slate lg:prose-[17px]
                    prose-h2:text-green-600
                    prose-h2:font-bold
                    prose-h3:text-green-600
                    prose-h3:font-semibold
                    prose-h4:text-gray-900
                    prose-a:text-blue-600
                    prose-pre:leading-10
                    prose-code:leading-10">
                    <x-markdown>
                      {!! $tipscoding->content !!}
                    </x-markdown>
                  </article>
                </div>
              </div>
            </div>

            <x-show-action
              name="Action"
              :indexs="route('tipscodings.index')"
              :edit="route('tipscodings.edit', $tipscoding->url)"
              :delete="route('tipscodings.destroy', $tipscoding->url)"
            />
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
