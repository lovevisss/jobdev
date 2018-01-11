<div class="col-sm-3 search_section no-padding">
	{{ Form::open(['url' => 'search'])}}
	<div class="input-group ">
  	<input title="请输入您想搜索的关键词。" data-drupal-selector="edit-keys" class="form-search form-control" placeholder="Search" type="search" id="edit-keys" name="keys" value="" size="15" maxlength="128" data-toggle="tooltip" />
  	<span class="input-group-btn">
  		<button type="submit" value="Search" class="button js-form-submit form-submit btn-primary btn icon-only" name="">
  			<span class="sr-only">Search</span>
  			<span class="icon glyphicon glyphicon-search" aria-hidden="true"></span>
  		</button>
  	</span>
  </div>
  	{{ Form::close()}}
	@include('partials._contact')
  
</div>
  