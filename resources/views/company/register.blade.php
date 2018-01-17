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
			{{Form::open(['url' => route('post_company_register')])}}
				<div class="form_body">
					{{Form::text('name', null, ['placeholder' => '用户名', 'class' => 'form-control'])}}
					{!!$errors->first('name', '<span class="help-block">:message</span>')!!}
					{{Form::text('phone', null, ['placeholder' => '手机', 'class' => 'form-control'])}}
					{!!$errors->first('phone', '<span class="help-block">:message</span>')!!}
					{{Form::text('email', null, ['placeholder' => '邮箱', 'class' => 'form-control'])}}
					{!!$errors->first('email', '<span class="help-block">:message</span>')!!}
					{{Form::password('password', ['placeholder' => '密码', 'class' => 'form-control'])}}
					{!!$errors->first('password', '<span class="help-block">:message</span>')!!}
					{{Form::password('password_confirmation', ['placeholder' => '确认密码', 'class' => 'form-control'])}}
					{!!$errors->first('password_confirmation', '<span class="help-block">:message</span>')!!}

					{{Form::submit('注册', ['class' => 'btn btn-green btn-block'])}}
					<div class="agree_text">
					注册代表你已同意<a href="{{route('terms')}}">「用户协议」</a>
					</div>
				</div>
			{{Form::close()}}
		</div>
		<div class="divider fl"></div>
		<div class="right_area fl">
			<h5>已有账号:</h5>
			<a href="{{route('company_entry')}}" class="login_now">直接登录 <i class="glyphicon glyphicon-log-in"></i></a>
		</div>
	</div>
@endsection

@section('script')


@endsection