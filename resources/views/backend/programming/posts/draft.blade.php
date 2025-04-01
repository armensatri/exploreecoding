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
        <div class="max-w-[85rem] mx-auto">
          <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto min-w-full">
              <div class="p-1.5 inline-block xl:max-w-full align-middle leading-none">
                <div class="overflow-hidden app-table-border">
                  <div class="grid app-table-grid">
                    <x-description
                      table-name="Posts"
                      :page-data="$posts"
                    />

                    <div class="table-header">
                      <div class="inline-flex items-center gap-x-2">
                        <div class="refresh">
                          <x-refresh
                            :route="route('posts.draft')"
                          />
                        </div>

                        <div class="search">
                          <form action="/posts/draft">
                            <x-search
                              search="posts"
                              placeholder="Search data posts"
                            />
                          </form>
                        </div>

                        <div class="indexs">
                          <x-indexs
                            :route="route('posts.index')"
                            name="back to posts"
                          />
                        </div>
                      </div>
                    </div>
                  </div>

                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-200">
                      <tr>
                        <x-th
                          name="no"
                        />
                        <x-th
                          name="id"
                        />
                        <x-th
                          name="playlist"
                        />
                        <x-th
                          name="sp"
                        />
                        <x-th
                          name="image"
                        />
                        <x-th
                          name="title"
                        />
                        <x-th
                          name="status"
                        />
                        <x-th
                          name="url"
                        />
                        <x-th-action/>
                      </tr>
                    </thead>

                    <tbody class="tbody">
                      @foreach ($posts as $post)
                        <tr>
                          <td class="h-px whitespace-nowrap">
                            <div class="center">
                              <x-td-var
                                :var="$loop->iteration . '.'"
                              />
                            </div>
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <div class="center">
                              <x-td-var
                                :var="$post->id"
                              />
                            </div>
                          </td>

                          <td class="w-48 h-px min-w-48">
                            <x-td-var-width
                              :var="$post->playlist->name"
                              :tooltip="$post->playlist->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <div class="center">
                              <x-td-var
                                :var="$post->sp"
                              />
                            </div>
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <div class="center">
                              <x-td-image
                                :asset="$post->image"
                                asset-default="/image/default.png"
                              />
                            </div>
                          </td>

                          <td class="w-48 h-px min-w-48">
                            <x-td-var-width
                              :var="$post->title"
                              :tooltip="$post->title"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var-bg
                              :bg="$post->status->bg"
                              :text="$post->status->text"
                              :var="$post->status->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$post->url"
                            />
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <x-td-action
                              :id="$post->id"

                              :show="route(
                                'posts.show', $post->url
                              )"

                              :edit="route(
                                'posts.edit', $post->url
                                )"

                              :delete="route(
                                'posts.destroy', $post->url
                              )"
                            />
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="grid app-table-footer">
                    @if ($posts->lastPage() > 1)
                      <x-pagination
                        :pagination="$posts"
                      />
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endSection
