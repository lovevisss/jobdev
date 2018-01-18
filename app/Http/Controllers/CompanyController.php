<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterCompanyRequest as RegisterCompanyRequest;
use App\Http\Requests\CompanyLoginRequest as CompanyLoginRequest;
use App\User;
use App\Company;
use App\Appointment;
class CompanyController extends Controller
{

	public function __construct()
    {
        // $this->middleware('auth');
    }

    public function login()
    {
    	return view('company.login');
    }

    public function logout()
    {
    	\Auth::logout();
    	return \Redirect::route('login');
    }

    public function post_register(RegisterCompanyRequest $request)
    {
    	if(User::where('email' , '=', $request->get('email'))->first())
    		{
    			return 'exists';
    		}
    	else
    	{
    		$user = new User;
    		$user->name = $request->get('name');
    		$user->email = $request->get('email');
    		$user->phone = $request->get('phone');
    		$user->role_id = 3;  //campany
    		$user->password = \Hash::make($request->get('password'));
    		$user->save();
    		$company = new Company;
    		$company->user_id = $user->id;
    		$company->save();
    		return 'success';
    	}

    }

    public function register()
    {
    	return view('company.register');
    }


    public function post_login(CompanyLoginRequest $request){
    	$credit = \Input::only('name', 'password');
    	// dd($credit);
    	if(\Auth::attempt($credit))
		{
			return \Redirect::route('company_index');
		}
		else{
			return \Redirect::route('company_entry')->with('message', '用户名或密码错误');
		}
    }

    public function get_index(){
    	$user = \Auth::user();
    	$company = Company::where('user_id' , '=', $user->id)->first();
    	// dd($company);
    	return view('company.index', compact('user','company'));
    }

    public function edit(){
    	return "edit";
    }

    public function update(\Request $request){
    	$user = \Auth::user();
    	$company = Company::where('user_id', '=', $user->id)->first();
    	$company->name =  \Input::get('name');
    	$company->description = \Input::get('description');
    	$company->city = \Input::get('city');
    	$company->recruit = \Input::get('recruit');
    	$company->save();
    	return \Redirect::route('company_index', compact('user','company'));
    }

    public function appoint()
    {
    	$user = \Auth::user();
    	$company = Company::where('user_id' , '=', $user->id)->first();
    	$arr_addresses = [];
    	$arr_addresses[1] = "40人以下";
    	$arr_addresses[2] = "40到80人";
    	$arr_addresses[3] = "80人以上";

    	return view('company.appoint', compact('user', 'company', 'arr_addresses'));
    }

    public function appoint_post(\Request $request)
    {
    	// return \Input::get('address_id');
    	$appoint = new Appointment;
    	$appoint->user_id = \Auth::user()->id;
    	$appoint->address_id = \Input::get('address_id');
    	$appoint->time = \Input::get('time');
    	$appoint->save();
    	return 'success';
    }

    public function admin_appointment()
    {
    	$appointment = Appointment::paginate(10);

    	return view('vendor.voyager.appointments.browse', compact('appointment'));
    }
}
