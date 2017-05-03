<?php

namespace App\Http\Controllers;

use App\Mac;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MacController extends Controller
{

	/**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing MAC Filter List
     *
     * @return Response
     */
    public function edit()
    {
        return view('edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function add(Request $request)
    {
    	$data = $request->all();
    	$rules = [  'address' => 'required|string|unique:macs,address|max:17|regex:/^([0-9A-Fa-f]{2}[:]){5}([0-9A-Fa-f]{2})$/',
            		'ip' => array('string', 
            			  'max:13', 
            			  'unique:macs,ip',
            			  'regex:/^192\.168\.0\.((\d{1,2})|(1\d{1,2})|(2[0-4][0-9])|(25[0-5])){1}$/'
        )];
        $messages = array(  'address' => 'Enter MAC Address as alphanumeric pairs separated by colons (xx:xx:xx:xx:xx:xx)',
            	  			'ip'  => 'Use IP Address format (192.168.0.x), where x is a number between 1 and 255'
        );

        $validator = Validator::make($data, $rules, $messages);        

        if ($validator->fails()) {
	        // redirect our user back to the form with the errors from the validator
	        return Redirect::to('edit')
	        	->withInput()
	            ->withErrors($messages);
    	}
    	else {
	        Mac::create([
	            'address' => strtoupper($request['address']),
	            'ip' => $request['ip']
	        ]);

	        return redirect('/')->with('message', 'MAC Address successfully added to filter list');
	    }
    }

    /**
     * Delete selected MAC Addresses
     *
     * @return Response
     */
    public function delete(Request $request)
    {
        dd($request->all());
        die;
    }

}
