<article class="round-full bg-white mb-4 p-2">
	<header class="text-gray-800">
		@if(!is_null($post->image))
			<div class="flex justify-center">
				<img src="{{ $post->image->url }}" alt="{{ $post->title }}" />
			</div>
		@endif

		<h2 class="text-3xl">{{ $post->title }}</h2>
		<span></span>
	</header>

	<p class="bg-white p-2">
			{{ $post->ingress }}
		</p>

	<div class="flex justify-end">
		<a class="bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded m-2" href="{{ route('post', ['slug' => $post->slug]) }}">Les mer</a>
	</div>
</article>
