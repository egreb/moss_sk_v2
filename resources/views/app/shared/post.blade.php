<article class="round-full bg-white mb-4 p-2">
	<header class="text-gray-800">
		@if(!is_null($post->image))
			<div class="flex justify-center">
				<img src="{{ $post->image->url }}" alt="{{ $post->title }}" />
			</div>
		@endif

		<a href="{{ $post->url }}">
			<h2 class="text-3xl">{{ $post->title }}</h2>
		</a>
	</header>

	<p class="mt-2">
			@if(!empty($post->ingress))
				{!! parsedown($post->ingress) !!}
			@else
				{!! parsedown($post->content) !!}
			@endif
	</p>

	<div class="flex justify-end">
		<a class="bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded m-2" href="{{ route('post', ['slug' => $post->slug]) }}">Les mer</a>
	</div>
</article>
