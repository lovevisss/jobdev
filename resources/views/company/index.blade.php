@extends('layouts.login')

@section('body')
	@include('partials.company._header')
	<div class="company_mainarea">
		<div class="col-sm-2 no-padding slider">
	<h1>你好,{{$user->name}}</h1>
	<ul>

			
        	<li>
            <a href="{{route('company_index')}}" class="active">
            <i class="glyphicon glyphicon-list-alt"></i><span> 公司信息</span><b class="icon-drop_right"></b>
            </a>
        	</li>      
        	<li>
            <a href="{{route('appointment_company')}}">
            <i class="glyphicon glyphicon-tag"></i><span> 招聘会预约</span><b class="icon-drop_right"></b>
            </a>
        	</li>  
    
             
    </ul>
	

	</div>
	<div class="col-sm-8 right_area">
		{{Form::model($company, ['route' => 'company.update', 'method' => 'PUT'])}}
		{{Form::hidden('id', $company->id)}}
		<p>
			{{Form::text('name', null, ['placeholder' => '公司名称', 'class' => 'form-control'])}}
			{!!$errors->first('name', '<span class="help-block">:message</span>')!!}
		</p>
		<p>
			{{Form::textarea('description', null, ['placeholder' => '公司简介', 'class' => 'form-control'])}}
			{!!$errors->first('description', '<span class="help-block">:message</span>')!!}
		</p>
		<p>
			{{Form::text('city', null, ['placeholder' => '城市', 'class' => 'form-control'])}}
			{!!$errors->first('city', '<span class="help-block">:message</span>')!!}
		</p>
		<p>
			{{Form::textarea('recruit', null, ['placeholder' => '招聘信息（招聘岗位，薪资，要求等）', 'class' => 'form-control'])}}
			{!!$errors->first('recruit', '<span class="help-block">:message</span>')!!}
		</p>
		<p>
			{{Form::submit('提交', ['class' => 'btn btn-green btn-block'])}}
		</p>
		{{Form::close()}}
	</div>
	</div>	
	
@endsection