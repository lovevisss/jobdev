
@extends('layouts.content')

@section('breadcrumb')

@include('partials._breadcrumb')

@endsection

@section('content')
<div class="article">
		<h2>{{$data->title}}</h2>
		<h5>发布时间:{{date_format($data->created_at,"Y/m/d")}} | 作者:{{$data->author}}</h5>
		<hr>
		{!!$data->body!!}

		@if($data->attach)
			@foreach(json_decode($data->attach,true) as $test)
				<a href="{{ Voyager::image($test['download_link']) }}" class="glyphicon glyphicon-paperclip"> {{$test['original_name']}}</a>
			@endforeach
		@endif
	</div>

@endsection