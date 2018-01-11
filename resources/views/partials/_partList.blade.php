<div class="@yield('outerclass')">
	<div class="in_title">
		<strong class="in_titleName">{{$news[0]->category->name}}</strong>
		<span class="in_titleLine"></span>
		<a href="@yield('link')" class="in_titleMore">更多<i class="glyphicon glyphicon-chevron-right"></i></a>
	</div>
	<div class="in_newsList">	
		<ul>
			@yield('list')
		</ul>
	</div>
	
</div>
