@extends('layouts.login')

@section('body')
	@include('partials._login_header')

	<div class="content_box clearfix">
		<h2>招人
		<i class="slash">|</i>
		<span>抢先预约招聘会</span>
		<a href="{{route('student_entry')}}">学生登录<i class="glyphicon glyphicon-chevron-right"> </i></a>
		</h2>
		<div class="left_area fl">
			{{Form::open(['url' => route('post_company_login')])}}

				<div class="form_body">
					{{Form::text('name', null, ['placeholder' => '用户名', 'class' => 'form-control'])}}
					{!!$errors->first('name', '<span class="help-block">:message</span>')!!}
					{{Form::password('password', ['placeholder' => '密码', 'class' => 'form-control'])}}
					{!!$errors->first('password', '<span class="help-block">:message</span>')!!}
					@if(Session::has('message'))
						<p class="red_alert">{{Session::get('message')}}</p>
					@endif
					{{Form::submit('登录', ['class' => 'btn btn-green btn-block'])}}
					
				</div>
				
			{{Form::close()}}
		</div>
		<div class="divider fl"></div>
		<div class="right_area fl">
			<h5>已有账号:</h5>
			<a href="{{route('company_entry')}}">直接登录 <i class="glyphicon glyphicon-log-in"></i></a>
		</div>
	</div>
@endsection