<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	{{Html::style('css/bootstrap.min.css')}}
	@yield('css')
	{{Html::style('css/normalize.css')}}
	{{-- {{Html::style('css/style.css')}} --}}
	{{Html::style('css/company.css')}}
</head>
<body>
	@yield('body')
</body>
{{Html::script('js/jquery-1.11.1.min.js')}}
	{{Html::script('js/main.js')}}
	<!--[if lt IE 9]>
    　 <script src="https://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
       <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
	@yield('script')
</html>