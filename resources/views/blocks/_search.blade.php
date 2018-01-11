
@extends('layouts.content')


@section('content')
<div class="breadcrumb">
	<p>搜索: {{$keys}}   <span>共找到{{$posts->total()}}个结果</span></p>
</div>
<div class="article in_newsList">
	<ul>
	@if($posts->total() != 0)
		@foreach($posts as $data)
							<li>
								<a href="{{route('post', ['id' => $data->id])}}" title="{{$data->title}}">
									<i class="glyphicon glyphicon-triangle-right"></i>
									<strong>{{App\Helper\StringHelper::substrtitle($data->title,50)}}</strong>
									<span>{{date_format($data->created_at,"m-d")}}</span>
								</a>
							</li>
							<div class="clearfix">	</div>
		@endforeach
	@else
		<p>没有找到有关该关键词的相关文章</p>
	@endif
	</ul>

</div>
<div class="paginate">
		{{$posts->links()}}
</div>
@endsection