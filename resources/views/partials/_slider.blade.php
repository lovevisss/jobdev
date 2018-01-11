<div class="swiper-container col-sm-6">
	<div class="swiper-wrapper">
		@foreach($posts as $post)
			<div class="swiper-slide"><a href="post/{{$post->id}}"><img src="storage/{{$post->image}}" alt=""><span>{{$post->title}}</span></a></div>
		@endforeach
	</div>
	<div class="swiper-pagination"></div>
	<div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>
</div>