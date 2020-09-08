<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function index() {

    	if (Auth::user()) {


	    	$user = Auth::user();
	        $role = $user->role->toArray();

	        if(Auth::check() && $role[0]['name'] == 'admin') {

	          return redirect()->route('admin');

	        } else if (Auth::check() && $role[0]['name'] == 'guest') {
	        	return redirect()->route('feedback');
	        }

	    }

	    return redirect('/login');






    }
}
