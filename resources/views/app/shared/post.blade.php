<article class="rounde-full border-gray-200 post">
	<header class="bg-gray-200 text-gray-800 p-2">
		<h2 class="text-xl">{{ $post->title }}</h2>
		<span></span>
	</header>

	<p class="bg-white p-2">
			{{ $post->ingress }}
		</p>

	<div class="flex justify-end">
		<button class="bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded m-2">Les mer</button>
	</div>
</article>
