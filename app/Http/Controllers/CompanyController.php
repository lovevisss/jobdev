<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterCompanyRequest as RegisterCompanyRequest;
use App\Http\Requests\CompanyLoginRequest as CompanyLoginRequest;
use App\User;
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
    	return view('company.index', compact('user'));
    }

    public function edit(){
    	return "edit";
    }
}
