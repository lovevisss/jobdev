@extends('layouts.login')

@section('body')
	@include('partials.company._header')
	<div class="company_mainarea">
		<div class="col-sm-2 no-padding slider">
	<h1>你好,{{$user->name}}</h1>
	<ul>

			
        	<li>
            <a href="{{route('company_index')}}" >
            <i class="glyphicon glyphicon-list-alt"></i><span> 公司信息</span><b class="icon-drop_right"></b>
            </a>
        	</li>      
        	<li>
            <a href="{{route('appointment_company')}}" class="active">
            <i class="glyphicon glyphicon-tag"></i><span> 招聘会预约</span><b class="icon-drop_right"></b>
            </a>
        	</li>  
    
             
    </ul>
	

	</div>
	<div class="col-sm-8 right_area">
		<div class="article_main">
			<ul class="clearfix toptab">
				<li class="tabactive">
					<a href="{{route('appointment_company')}}">我的预约</a>
				</li>
				<div class="left_wrap">
					<a href="{{route('appointment_company')}}" class="wanna-build">预约</a>
				</div>
			</ul>
		</div>
		{{Form::open(['url' => route('post_appointment')])}}
		{{-- {{Form::open(['url' => route('post_company_register')])}} --}}
				<div class="form_body">
					<div class="input-group">
					{{Form::label('地点大小',null,['class' => 'input-group-addon'])}}
					{{Form::select('address_id', $arr_addresses, null, ['class' => 'form-control'])}}
					{!!$errors->first('address', '<span class="help-block">:message</span>')!!}
					</div>

					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1">预约时间</span>
					  
						{{Form::text('time', null, ['placeholder' => '首选时间', 'class' => 'form-control datepicker'])}}
						{!!$errors->first('time', '<span class="help-block">:message</span>')!!}
					</div>
					@if(Session::has('message'))
						<p class="red_alert">{{Session::get('message')}}</p>
					@endif
					{{Form::submit('提交', ['class' => 'btn btn-green btn-block'])}}
					
				</div>

		{{Form::close()}}
	</div>
	</div>	
	
@endsection

@section('script')

{{Html::script('js/data.js')}}
{{Html::script('js/datepicker.js')}}
<script type="text/javascript">
	var data = window.datepicker.getMonthData(2017,10);
	// console.log(data);
	window.datepicker.init('.datepicker');
	// var dom = document.getElementBy
</script>

@endsection