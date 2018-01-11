@extends('layouts.main')


@section('body')

@include('blocks._secondarynavbar')
@include('blocks._content', ['data' => $post])
{{-- <h2>{{$post->title}}</h2>

{!!$post->body!!}

@if($post->attach)
	@foreach(json_decode($post->attach,true) as $test)
		{{$test['download_link']}}
	@endforeach
@endif --}}

@endsection