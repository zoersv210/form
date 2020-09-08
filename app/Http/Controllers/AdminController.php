<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class AdminController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }
	
     function index() {
     	$applicationAll = Application::with('user')->get();
    	return view('applications_list', compact('applicationAll'));
    }
}
