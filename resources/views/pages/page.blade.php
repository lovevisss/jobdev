@extends('layouts.main')

@section('body')
@include('blocks._secondarynavbar')

@include('blocks._content', ['data' => $page])


@endsection
{{-- 
@section('script')
<script type="text/javascript">
	$().ready(function(){
		$(window).scroll(
			function()
			{
				var css = {
					position:'fixed',
					left:'0px',
					top:'50px'
				}
				var css2 = {
					position:'absolute',
					left:'0px',
					top:'0px'
				}
				if($(document).scrollTop() >200){
					$('.slider').css(css);
				}

				else{
					$('.slider').css(css2);
				}
			})
	});
</script>

@endsection --}}