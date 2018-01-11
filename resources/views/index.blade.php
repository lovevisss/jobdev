@extends('layouts.main')

@section('css')
{{Html::style('css/swiper/swiper.min.css')}}
@endsection

@section('title')
{{env('APP_NAME', '浙江财经大学|就业网')}}
@endsection

@section('body')
<!-- new line -->
@include('partials._slider')
@include('blocks._news')
@include('blocks._sidebar')
<div class="clear" style="height: 40px"></div>
<!-- new line -->
@include('blocks._jobs')
@include('blocks._recommends')
@include('blocks._recruits')
<!-- new line -->
<div class="clear" style="height: 40px"></div>
@include('blocks._piclink')
@include('blocks._search_contact')
<div class="clear" style="height: 40px"></div>
@include('blocks._friendlink')
@endsection

@section('script')
{{Html::script('js/swiper/swiper.min.js')}}
{{Html::script('js/embed_index.js')}}
<script type="text/javascript">
	var mySwiper = new Swiper('.swiper-container', {
		direction: 'horizontal', 
		loop: true,

		pagination:{
			el:'.swiper-pagination',
		},

		navigation:{
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	})


</script>
<script type="text/javascript">
	$().ready(function(){
		onloadlst("index","info-list1",9,"","全职","");//版位标示，列表层ID，条数，职位类别，职位性质，单位性质
		onloadlst("index","info-list2",9,"","实习","");
	});
</script>
@endsection