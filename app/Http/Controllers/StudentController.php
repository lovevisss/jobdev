<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
     public function login()
    {
    	return view('company.login');
    }
}
