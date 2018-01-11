@extends('partials._partList')

@section('outerclass')
col-sm-3  small_list
@stop

@section('link')
{{route('category', ['id' => 1])}}
@endsection

@section('list')
	@foreach($news as $new)
		<li>
			<a href="post/{{$new->id}}" title="{{$new->title}}">
				<i class="glyphicon glyphicon-triangle-right"></i>
				<strong>{{App\Helper\StringHelper::substrtitle($new->title,12)}}</strong>
				<span>{{date_format($new->created_at,"m-d")}}</span>
			</a>
		</li>
		<div class="clearfix">	</div>
	@endforeach
@stop