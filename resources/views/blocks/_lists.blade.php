
@extends('layouts.content')

@section('breadcrumb')

@include('partials._breadcrumb')

@endsection

@section('content')
<div class="article in_newsList">
	<ul>
@foreach($posts as $data)
					<li>
						<a href="{{route('post', ['id' => $data->id])}}" title="{{$data->title}}">
							<i class="glyphicon glyphicon-triangle-right"></i>
							<strong>{{App\Helper\StringHelper::substrtitle($data->title,45)}}</strong>
							<span>{{date_format($data->created_at,"m-d")}}</span>
						</a>
					</li>
					<div class="clearfix">	</div>
@endforeach
	</ul>

</div>
<div class="paginate">
		{{$posts->links()}}
</div>
@endsection