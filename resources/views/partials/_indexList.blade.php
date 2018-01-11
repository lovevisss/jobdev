<div class="{{$outerclass}}">
	<div class="in_title">
		<strong class="in_titleName">
			@if(isset($datas))
			{{$datas[0]->category->name}}
			@endif
			@if(isset($columname))
			{{$columname}}
			@endif
		</strong>
		<span class="in_titleLine"></span>
		<a href="@if(isset($link))
				{{$link}}
			@endif" class="in_titleMore">更多<i class="glyphicon glyphicon-chevron-right"></i></a>
	</div>
	@if(isset($pics))
		<div class="in_itemImg">
				<a href="@if(isset($link))
				{{$link}}
			@endif"><img src="{{asset($pics)}}" width="378" height="134" alt=""></a>
		</div>
	@endif
	<div class="in_newsList" 
						>	
		<ul @if(isset($id_info))
						id="{{$id_info}}"
						@endif>
			@if(isset($datas))
			
				@foreach($datas as $data)
					<li>
						<a href="post/{{$data->id}}" title="{{$data->title}}">
							<i class="glyphicon glyphicon-triangle-right"></i>
							<strong>{{App\Helper\StringHelper::substrtitle($data->title,18)}}</strong>
							<span>{{date_format($data->created_at,"m-d")}}</span>
						</a>
					</li>
					<div class="clearfix">	</div>
				@endforeach

			
			@endif
		</ul>
	</div>
	
</div>