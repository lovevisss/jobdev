<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	{{Html::style('css/bootstrap.min.css')}}
	@yield('css')
	{{Html::style('css/normalize.css')}}
	{{Html::style('css/style.css')}}
</head>
<body>
	@include('partials._head')
	@include('partials._nav',['parent_menu' => $parent_menu])
	<div class="container">
		@yield('body')
	</div>
	@include('partials._foot')
</body>
	
	{{Html::script('js/jquery-1.11.1.min.js')}}
	{{Html::script('js/main.js')}}
	<!--[if lt IE 9]>
    　 <script src="https://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
       <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
	@yield('script')
</html>