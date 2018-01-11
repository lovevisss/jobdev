

<div class="col-sm-3 rolling_list">
		<h3 class="in_noticeTitle">{{$prerecruits[0]->category->name}}</h3>
		<div class="in_noticeList">
			<ul>
				@foreach($prerecruits as $recruit)
				<li>
					<a href="post/{{$recruit->id}}" title="{{$recruit->title}}"><i class="glyphicon glyphicon-triangle-right"></i>
						<strong>{{App\Helper\StringHelper::substrtitle($recruit->title,12)}}</strong>
						<span>{{date_format($recruit->created_at,"m-d")}}</span>
					</a>
				</li>
				<div class="clearfix"></div>
				@endforeach
			</ul>
		</div>
		<div class="in_noticeMore">
			<a href="{{route('category',['id' => 6])}}" title="{{$prerecruits[0]->category->name}}">查看更多</a>
		</div>
	</div>