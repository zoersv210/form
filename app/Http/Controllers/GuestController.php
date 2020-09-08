<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Request as Requests;
use App\Http\Requests\AddApplicationRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\sendMailAdmin;
use Illuminate\Support\Facades\Mail;




class GuestController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }

    
    function index() {
    	return view('feedback');
    }


    function checkTime() {
		$user = Auth::user();
		if ($user->application->isEmpty() ) {
    		return true;
		} else {
			$lastApplication = $user->application()->latest()->first()->created_at ;
				if ( $lastApplication->addDay() < Carbon::now() ) {
					return true;
				}
					return false;
				}
	}


   function store(AddApplicationRequest $request) {

		$user = Auth::user();
    	if( $this->checkTime() ) {
			$request = $request->all();
    		
			
			if (isset($request['file'])) {
    		$request['file'] = 
    		$request['file']->move(storage_path('files'), time() . '_' . $request['file']->getClientOriginalName());

    	}

    		
    		
			$application = new Application($request);
	    	Auth::user()->application()->save($application);


	    	$result = Mail::send('emails.sendAdmin', ['request'=> $request, 'user' => $user],
	    	 function($message) use ($request, $user) {
	    			$message->from($user['email'], $user['name'] );
	    			$message->to(env('MAIL_ADMIN'));
	    			$message->attach($request['file']);

	    	});

				return redirect()
					->back()
					->with('success', 'Сообщение отправлено');
    	} else {
				return redirect()
					->back()
					->with('danger', 'Сообщение может быть отправлено не более раза в сутки')
					->withInput($request->all());
    			} 
    }

   
  
}
