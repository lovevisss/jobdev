@extends('layouts.login')

@section('body')
    @include('partials.company._header')
    <div class="company_mainarea">
        <div class="col-sm-2 no-padding slider">
    <h1>管理预约</h1>
    <ul>

            
            <li>
            <a href="{{route('get_admin_appointment')}}" class="active">
            <i class="glyphicon glyphicon-list-alt"></i><span> 招聘会列表</span><b class="icon-drop_right"></b>
            </a>
            </li>      
            {{-- <li>
            <a href="{{route('appointment_company')}}" class="active">
            <i class="glyphicon glyphicon-tag"></i><span> 招聘会预约</span><b class="icon-drop_right"></b>
            </a>
            </li>   --}}
    
             
    </ul>
    

    </div>
    <div class="col-sm-8 right_area">
        <div class="article_main">
            <ul class="clearfix toptab">
                <li class="tabactive">
                    <a href="{{route('get_admin_appointment')}}">企业预约</a>
                </li>
                <div class="left_wrap">
                    <a href="/admin" class="wanna-build">返回</a>
                </div>
            </ul>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>公司名</th>
                    <th>申请时间</th>
                </tr>
            </thead>
          @foreach($appointment as $app)
            {{$app->id}}
          @endforeach
        </table>
        <div class="paginate">
        {{$appointment->links()}}
        </div>
    </div>
    </div>  
    
@endsection

