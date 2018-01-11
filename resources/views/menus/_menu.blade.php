<ul class="clearfix">
    @foreach($items as $key => $menu_item)
        <li class="@if($menu_item->title == $options->parent_menu->title)
        				current
        				@endif"><a class="navName" href={{$menu_item->link()}} >{{ $menu_item->title }}</a>
		@if($menu_item->children)
		<ul>
		 	@foreach($menu_item->children as $child)
          			<li><a href={{$child->link()}}>{{$child->title}}</a>	</li>
  			@endforeach
		</ul>
         
        @endif
        </li>
    @endforeach
</ul>