@extends('layouts.admin')

@section('content')
    <h2 class="text-3xl">Rediger nyhet</h2>
    <form class="bg-white shadow-md rounded px-4 pt-6 pb-8 mb-4" method="post"
          action="{{ route('admin.post.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
        @csrf

        <post-image post-id="{{ $post->id }}" image-id="{{ !is_null($post->image) ? $post->image->id : null }}"
                    image-name="{{ !is_null($post->image) ? $post->image->name : null }}"
                    image-url="{{ !is_null($post->image) ? $post->image->url() : null }}"
                    image-srcset="{{ !is_null($post->image) ? $post->image->srcset() : null }}"></post-image>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                Tittel
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="title" type="text" placeholder="Username" name="title" value="{{ old('title') ?? $post->title }}">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div id="ingress">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="ingress">
                Ingress
            </label>
            <markdown-area name="ingress" value="{{ old('ingress') ?? $post->ingress }}"
                           :upload-image="false"></markdown-area>

            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                Innhold
            </label>
            @error('story')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <markdown-area name="story" value="{{ old('story') ?? $post->story }}" :upload-image="true"></markdown-area>
        </div>

        <div class="mb-6 flex">
            <label class="custom-label flex" for="draft">
                <span class="select-none mr-3">Publiser</span>
                <div class="bg-white shadow w-6 h-6 p-1 flex justify-center items-center mr-2">
                    <input type="checkbox" class="hidden" name="draft"
                           id="draft" {{ !$post->draft ? 'checked' : '' }}>
                    <svg class="hidden w-4 h-4 text-green-600 pointer-events-none" viewBox="0 0 172 172">
                        <g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none"
                           font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal">
                            <path d="M0 172V0h172v172z"/>
                            <path
                                d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z"
                                fill="currentColor" stroke-width="1"/>
                        </g>
                    </svg>
                </div>
            </label>
            <input class="ml-5" type="date" name="published_at" value="{{ old('published_at') ?? $post->published_at->format('Y-m-d') }}">
        </div>

        <div class="flex items-center pb-32">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-3">
                Lagre
            </button>

            <button id="delete-post" data-url="{{ route('admin.post.delete', ['id' => $post->id]) }}"
                    class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Slett
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 ml-10"
               href="{{ route('admin.post.index') }}">
                Avbryt
            </a>
        </div>
    </form>


    @include('admin.shared.modal', ['title' => 'Galleri'])
@endsection
