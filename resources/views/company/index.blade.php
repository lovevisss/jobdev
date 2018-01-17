@extends('layouts.login')

@section('body')
	@include('partials.company._header')
	<div class="company_mainarea">
		<div class="col-sm-2 no-padding slider">
	<h1>你好,{{$user->name}}</h1>
	<ul>

			
        	<li>
            <a href="{{route('edit_company')}}" class="active">
            <i class="glyphicon glyphicon-list-alt"></i><span> 公司信息</span><b class="icon-drop_right"></b>
            </a>
        	</li>      
        	<li>
            <a href="{{route('edit_company')}}">
            <i class="glyphicon glyphicon-tag"></i><span> 招聘会预约</span><b class="icon-drop_right"></b>
            </a>
        	</li>  
    
             
    </ul>
	

	</div>
	<div class="col-sm-8">
		test
	</div>
	</div>	
	
@endsection